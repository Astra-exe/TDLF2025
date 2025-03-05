from utils.features import (
    playerp
)

from flask import Flask, request, jsonify
from flask_cors import CORS
import requests
import numpy as np

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
        response = requests.post('http://localhost:8080/v1/auth/login', json=payload)
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
@app.route('/profile', methods=['GET'])
def make_profile():
    #get api key
    api_key = get_apikey()
    if api_key is None:
        return jsonify({"error":"No se pudo obtener la Api Key para la ruta /profile"}), 400
    headers = {
        'X-API-KEY': api_key
    }
    #Get the data
    try:
        response = requests.get('http://localhost:8080/v1/players/8cacaf56-20d0-4224-8220-92e236b7da0a', headers=headers)
        if response.status_code == 200:
            data = response.json()
        else:
            return jsonify(response.json(), response.status_code)
        
        data = data['data']
        age = int(data['age'])
        height = float(data['height'])
        weight = float(data['weight'])

        #make the player profile
        profile = playerp(height, weight, age)
        return jsonify(profile), 200


    
    except Exception as e:
        print(str(e))
        return jsonify({'error':str(e)}), 400
    
@app.route('/map', methods=['GET'])
def make_map():
    #get api key
    api_key = get_apikey()
    if api_key is None:
        return jsonify({"error": "No se pudo obtener la Api Key para la ruta /map"}), 400
    headers = {
        'X-API-KEY': api_key
    }
    #Get the data
    



if __name__ == "__main__":
    app.run(port=3000, debug = True)