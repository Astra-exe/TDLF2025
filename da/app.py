from utils.features import (
    playerp,
    players_location,
    clear_cache
)

from flask import Flask, request, jsonify, render_template
from flask_cors import CORS
import requests
import numpy as np
import pandas as pd

import os
from dotenv import load_dotenv

load_dotenv()

#create the app
app = Flask(__name__)
CORS(app)

app.config["API_USER"] = os.getenv("API_NICKNAME")
app.config["API_PASSWORD"] = os.getenv("API_PASSWORD")

def get_apikey():
    payload = {
        "nickname":app.config["API_USER"],
        "password":app.config["API_PASSWORD"]
    }

    try:
        response = requests.post('https://api-nq8l.onrender.com/v1/auth/login', json=payload)
        response.raise_for_status()
        data = response.json()
        data = data['data']
        return data['api_key']
    
    except requests.exceptions.HTTPError as err:
        print(err)
    except requests.exceptions.ConnectionError:
        print("Error de conexión")
    except requests.exceptions.Timeout:
        print("Se agotó el tiempo de la solicitud")
    except Exception as e:
        print("Error inesperado: ", str(e))
    
    return None
#endpoints
@app.route('/')
def home():
    return render_template('welcome.html')

@app.route('/profile/<player_id>', methods=['GET'])
def make_profile(player_id):
    # Get the API key
    api_key = get_apikey()
    if api_key is None:
        return jsonify({"error": "No se pudo obtener la Api Key para la ruta /profile"}), 400

    headers = {
        'X-API-KEY': api_key
    }

    # Get the player data
    try:
        response = requests.get(f'https://api-nq8l.onrender.com/v1/players/{player_id}', headers=headers)
        response.raise_for_status()
        data = response.json()

        player_data = data['data']
        age = int(player_data['age'])
        height = float(player_data['height'])
        weight = float(player_data['weight'])

        # Generate recommendations
        profile = playerp(height, weight, age)
        return jsonify(profile), 200

    except requests.exceptions.HTTPError as err:
        # Handle HTTP errors
        return jsonify({"error": f"Error al obtener datos del jugador: {str(err)}"}), err.response.status_code
    except Exception as e:
        # Handle other exceptions
        print(str(e))
        return jsonify({"error": str(e)}), 500
    
@app.route('/map', methods=['GET'])
def make_map():
    # Obtener la API key
    api_key = get_apikey()
    if api_key is None:
        return jsonify({"error": "No se pudo obtener la Api Key para la ruta /map"}), 400

    headers = {
        'X-API-KEY': api_key
    }

    # get the first call
    try:
        response = requests.get('https://api-nq8l.onrender.com/v1/players', headers=headers)

        # Verificar el código de estado de la respuesta
        if response.status_code == 200:
            # Verificar si la respuesta tiene contenido
            if response.text.strip():
                first_call = response.json()
            else:
                return jsonify({"error": "Respuesta vacía de la API"}), 500
        else:
            print("Error:", response.text, response.status_code)
            return jsonify({"error": response.text, "status_code": response.status_code}), response.status_code
        
        # get players info from all pages
        pages = first_call["pagination"]["total"]
        players = []

        for i in range(1, pages + 1):
            params = {
                "page": i
            }
            response = requests.get("https://api-nq8l.onrender.com/v1/players", headers=headers, params=params)
            if response.status_code == 200:
                data = response.json()
                players.extend(data["data"])
            else:
                return jsonify({"error": response.text, "status_code": response.status_code}), response.status_code
        
        #count the number of players by city
        cities = {}
        for player in players:
            if player["city"] in cities:
                cities[player["city"]] += 1
            else:
                cities[player["city"]] = 1
        
        #make a df with two columns city and number of players
        cities_df = []
        for city, count in cities.items():
            cities_df.append({
                "city": city,
                "players": count
            })
        #make a df with pandas
        df = pd.DataFrame(cities_df)
        df = df.sort_values("players", ascending=False).head(30)

        #create the map
        map = players_location(df)
        return jsonify({"map_html": map}), 200

    except requests.exceptions.RequestException as e:
        print(str(e))
        return jsonify({'error': str(e)}), 400

@app.route('/clear_cache', methods=['DELETE'])
def clear():
    #clear the cache
    try:
        clear = clear_cache()
        return jsonify({"message": clear}), 200
    except Exception as e:
        print(str(e))
        return jsonify({'error': str(e)}), 400

if __name__ == "__main__":
    app.run(port=3000, debug = True)