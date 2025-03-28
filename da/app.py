from utils.features import (
    playerp,
    players_location,
    plotly_plot_parity,
    extract_group,
    plotly_plot_points,
    plotly_plot_sinergy,
    plotly_plot_sinergy_compare,
    plotly_plot_points_compare
)

from flask import Flask, request, jsonify, render_template
from flask_cors import CORS
import requests
import numpy as np
import pandas as pd

import os
from dotenv import load_dotenv
import json

load_dotenv()

#create the app
app = Flask(__name__)
CORS(app)

app.config["API_USER"] = os.getenv("API_NICKNAME")
app.config["API_PASSWORD"] = os.getenv("API_PASSWORD")
app.config["CATHEGORY_SENIORS_ID"] = os.getenv("CATHEGORY_SENIORS_ID")
app.config["CATHEGORY_OPEN_ID"] = os.getenv("CATHEGORY_OPEN_ID")

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

@app.route('/parity/<cathegory_id>', methods=['GET'])
def group_parity(cathegory_id):
    if cathegory_id == app.config["CATHEGORY_SENIORS_ID"]:
        try:
            with open("parity_seniors.json", "r") as file:
                data = json.load(file)
                data = pd.DataFrame(data)
            plot_json = plotly_plot_parity(data)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Grupos", "y-axis":"Indice de paridad", "title":"¿Qué tan parejos estuvieron los grupos de la categoria 50 y más?"})
            return prepare,200
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404

    elif cathegory_id == app.config["CATHEGORY_OPEN_ID"]:
        try:
            with open("parity_open.json", "r") as file:
                data = json.load(file)
                data = pd.DataFrame(data)
                #print(data)
            plot_json = plotly_plot_parity(data)
            #print(plot_json)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Grupos", "y-axis":"Indice de paridad", "title":"¿Qué tan parejos estuvieron los grupos de la categoria Libre?"})
            return prepare,200
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404

    return jsonify({"error": "Categoría no válida"}), 400

@app.route('/points/<cathegory_id>/<group>', methods=['GET'])
def points(cathegory_id, group):

    if cathegory_id == app.config["CATHEGORY_SENIORS_ID"]:
        if group not in ['A', 'B', 'C', 'D']:
            return jsonify({"error": "Grupo no válido"}), 400
        try:
            df = pd.read_csv("data_matches_seniors.csv")
            df_group = extract_group(df, group)
            #print(df_group)
            plot_json = plotly_plot_points(df_group)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Jugadores", "y-axis":"Puntos", "title":"Puntos hechos vs puntos recibidos del grupo " + group})
            return prepare,200
        
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404
    
    elif cathegory_id == app.config["CATHEGORY_OPEN_ID"]:
        if group not in ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H']:
            return jsonify({"error": "Grupo no válido"}), 400
        try:
            df = pd.read_csv("data_matches_open.csv")
            df_group = extract_group(df, group)
            #print(df_group)
            plot_json = plotly_plot_points(df_group)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Jugadores", "y-axis":"Puntos", "title":"Puntos hechos vs puntos recibidos del grupo " + group})
            return prepare,200
        
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404

    return jsonify({"error": "Categoría no válida"}), 400

@app.route('/sinergy/<cathegory_id>', methods=['GET'])
def sinergy(cathegory_id):
    if cathegory_id == app.config["CATHEGORY_SENIORS_ID"]:
        try:
            df_s = pd.read_csv("data_matches_seniors.csv")
            df_s = df_s[['team', 'points_scored', 'points_received']].copy()
            df_s['sinergy'] = (((df_s['points_scored'] - df_s['points_received']+3) / 30) * 100).round(2)
            df_s["sinergy"] = df_s['sinergy'].apply(lambda x: x+0.1 if x == 0 else x)
            df_s['team'] = df_s['team'].apply(lambda x: '-'.join(x.strip('[]').split(', ')))
            plot_json = plotly_plot_sinergy(df_s)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Parejas", "y-axis":"Sinergia", "title":"Sinergia de los equipos de la categoria 50 y más"})
            return prepare,200
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404
    elif cathegory_id == app.config["CATHEGORY_OPEN_ID"]:
        try:
            df_o = pd.read_csv("data_matches_open.csv")
            df_o = df_o[['team', 'points_scored', 'points_received']].copy()
            df_o['sinergy'] = (((df_o['points_scored'] - df_o['points_received']+3) / 30) * 100).round(2)
            df_o["sinergy"] = df_o['sinergy'].apply(lambda x: x+0.1 if x == 0 else x)
            df_o['team'] = df_o['team'].apply(lambda x: '-'.join(x.strip('[]').split(', ')))
            plot_json = plotly_plot_sinergy(df_o)
            prepare =  jsonify({"data": plot_json["data"], "x-axis":"Parejas", "y-axis":"Sinergia", "title":"Sinergia de los equipos de la categoria Libre"})
            return prepare,200
        except FileNotFoundError:
            return jsonify({"error": "Archivo no encontrado"}), 404
    return jsonify({"error": "Categoría no válida"}), 400

@app.route('/sinergy_compare', methods=['GET'])
def sinergy_compare():
    try:
        df_s = pd.read_csv("data_matches_seniors.csv")
        df_s = df_s[['team', 'points_scored', 'points_received']].copy()
        df_s['sinergy'] = (((df_s['points_scored'] - df_s['points_received']+3) / 30) * 100).round(2)
        df_s["sinergy"] = df_s['sinergy'].apply(lambda x: x+0.1 if x == 0 else x)
        sinergy_senior = df_s['sinergy'].mean()

        df_o = pd.read_csv("data_matches_open.csv")
        df_o = df_o[['team', 'points_scored', 'points_received']].copy()
        df_o['sinergy'] = (((df_o['points_scored'] - df_o['points_received']+3) / 30) * 100).round(2)
        df_o["sinergy"] = df_o['sinergy'].apply(lambda x: x+0.1 if x == 0 else x)
        sinergy_open = df_o['sinergy'].mean()

        sinergy_group = {
            'sinergy_open': float(sinergy_open),
            'sinergy_senior': float(sinergy_senior)
        }
        sinergy_group["sinergy_open"] = round(sinergy_group["sinergy_open"], 4)
        sinergy_group["sinergy_senior"] = round(sinergy_group["sinergy_senior"], 4)

        plot_json = plotly_plot_sinergy_compare(sinergy_group)
        prepare =  jsonify({"data": plot_json["data"], "x-axis":"Categoría", "y-axis":"Sinergia", "title":"Comparativa de sinergia entre categorias"})
        return prepare,200
    
    except FileNotFoundError:
        return jsonify({"error": "Archivo no encontrado"}), 404
    
@app.route('/points_compare', methods=['GET'])
def points_compare():
    try:
        df_s = pd.read_csv("data_matches_seniors.csv")
        points_seniors = df_s['points_scored'].sum()
        points_seniors = points_seniors/4

        df_o = pd.read_csv("data_matches_open.csv")
        points_open = df_o['points_scored'].sum()
        points_open = points_open/8

        points_groups = {
        'points_open': float(points_open),
        'points_seniors': float(points_seniors)
        }
        plot_json = plotly_plot_points_compare(points_groups)
        prepare =  jsonify({"data": plot_json["data"], "x-axis":"Categoría", "y-axis":"Puntos promedio", "title":"Promedio de puntos hechos por categoria"})
        return prepare,200
        
    except FileNotFoundError:
        return jsonify({"error": "Archivo no encontrado"}), 404

if __name__ == "__main__":
    app.run(port=3000, debug = True)