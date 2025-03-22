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
        response = requests.post('https://api-x90k.onrender.com/v1/auth/login', json=payload)
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
        response = requests.get(f'https://api-x90k.onrender.com/v1/players/{player_id}', headers=headers)
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
    
    try:
        with open("players_location.json", "r") as file:
            df = pd.read_json(file)
        
        # Get the map
        map_html = players_location(df)
        return jsonify({"map": map_html}), 200
    
    except FileNotFoundError:
        return jsonify({"error": "Archivo no encontrado"}), 404
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