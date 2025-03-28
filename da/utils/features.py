# Description: This file contains the functions to extract features from the data.

# Required Libraries
import base64
import pandas as pd
import numpy as np

import folium
from folium.plugins import HeatMap
import plotly.graph_objects as go
import plotly.io as pio
import time
import requests

import json
from pathlib import Path

# Function to create a recommendation profile for a player based on their height, weight and age.
# The function returns a dictionary with recommendations for the player´s position, workout and phisical priority.
def playerp(height, weight, age):
    recommendations = {
        'position':None,
        'workout':None,
        'priority':None
    }

    #1th profile: Tall and thin
    if height >= 1.78 and weight <= 78:
        recommendations["position"] = "Zaguero. En el fondo con recorrido hacia media cancha para interceptar pelotas."
        recommendations["workout"] = "Trabajar fuerza en piernas y core + Ejercicios rotadores de hombros y articulaciones para prevenir lesiones."
        if age <= 28:
            recommendations["priority"] = "Enfócate en mejorar la resistencia y el desarrollo muscular."
        elif 28 < age <= 38:
            recommendations["priority"] = "Enfócate en mantener la flexibilidad y mejora los ángulos de golpe."
        else:
            recommendations["priority"] = "Prioriza la recuperación post juego y evita la sobrecarga de articulaciones."
    
    #2nd profile: Tall and heavy
    if height >=1.78 and weight > 78:
        recommendations["position"] = "Zaguero. Al fondo a posición media para combinar alcance y potencia."
        recommendations["workout"] = "Mejorar agilidad con ejercicios de cambio de dirección. Incluye sentadillas isometricas para fortalecer articulaciones."
        if age <= 28:
            recommendations["priority"] = "Potenciar la explosividad de tus remates y la resistencia."
        elif 28 < age <= 38:
            recommendations["priority"] = "Controla tu peso y trabaja la resistencia y flexibilidad."
        else:
            recommendations["priority"] = "Prioriza reducir el impacto en las rodillas con entrenamiento previo en superficies blandas."
    
    #3rd profile: short and heavy
    if height < 1.78 and weight > 78:
        recommendations["position"] = "Delantero. Para remates rápidos, fuertes y voleas."
        recommendations["workout"] = "Trabaja agilidad y equilibrio con ejercicios de reacción. Usa voleas agresivas para definir puntos."
        if age <= 28:
            recommendations["priority"] = "Enfócate en desarrollar potencia en piernas y brazos."
        elif 28 < age <= 38:
            recommendations["priority"] = "Combina la fuerza con estrategia de juego corto."
        else:
            recommendations["priority"] = "Enfatizar movilidad articular (tobillos y cadera). Prioriza la estrategia de juego."
            
    #4th profile: short and thin
    if height < 1.78 and weight <=78:
        recommendations["position"] = "Delantero. Aprovecha tu velocidad."
        recommendations["workout"] = "Mejora tu agilidad con ejercicios de reacción. Usa golpes cortos y cambios de dirección para desequilibrio."
        if age <= 28:
            recommendations["priority"] = "Priorizar la técnica de golpe y desplazamientos (visión de juego)."
        elif 28 < age <= 38:
            recommendations["priority"] = "Enfócate en aumentar masa muscular para mejorar potencia de golpe."
        else:
            recommendations["priority"] = "Prevención de lesiones con entrenamiento de estiramiento y cambio de ritmo."
        
    return recommendations

# Functions to create a map to know how many players visit the tournament for each city.
#the function returns a map with folium 
def players_location(df):
    # Create map
    mapa = folium.Map(
        location=[20.6736, -101.325],
        zoom_start=5,
        tiles="CartoDB dark_matter",
        attr='© CARTO'
    )

    # Prepare data for heatmap
    heat_data = [
        [row["coords"][0], row["coords"][1], row["players"]]
        for _, row in df.iterrows()
    ]

    HeatMap(heat_data, radius=25, blur=15).add_to(mapa)
    return mapa._repr_html_()

def decode_bdata(bdata, dtype):
    decoded_bytes = base64.b64decode(bdata)
    return np.frombuffer(decoded_bytes, dtype=dtype)

#Function to extract the necessary data from the plotly json format
def extract_plotly_data(json):
    # Extract the relevant data from the plotly JSON
    data = json["data"][0]
    marker_color = data["marker"]["color"]
    text = [item[1] for item in data["text"]]
    x = data["x"]
    y = text  # Assuming y is the same as text for the bar chart

    # Create a new format for the data
    new_format = {
        "data": [{
            "marker": {"color": marker_color, "cornerradius": 10},
            "text": text,
            "textposition": "auto",
            "x": x,
            "y": y,
            "type": "bar"
        }]
    }
    return new_format

def extract_plotly_data_points(plotly_json):
    extracted_data = []
    for data in plotly_json["data"]:
        marker_color = data["marker"]["color"]
        text = decode_bdata(data["text"]["bdata"], data["text"]["dtype"]).tolist()
        y = decode_bdata(data["y"]["bdata"], data["y"]["dtype"]).tolist()
        x = data["x"]

        extracted_data.append({
            "marker": {"color": marker_color, "cornerradius": 10},
            "text": text,
            "textposition": "auto",
            "x": x,
            "y": y,
            "type": "bar"
        })
    return {"data": extracted_data}

#function to return the parity plot in json format
def plotly_plot_parity(df):
    # Crear la figura
    fig = go.Figure()

    # Agregar los datos al gráfico de barras
    fig.add_trace(go.Bar(x=df['group'],
                    y=df['parity_index'],
                    marker_color='#E61357',  # Color de las barras
                    text=df.values,  # Texto que se mostrará encima de cada barra
                    textposition='auto',  # Posición del texto
                    ))

    fig.update_layout(title='¿Qué tan parejos estuvieron los grupos?',
                xaxis_title='Grupo',
                yaxis_title='Indice de paridad',
                plot_bgcolor='#241111',  # Fondo negro
                paper_bgcolor='#000000',  # Fondo del área del gráfico negro
                font=dict(color='white'),  # Color del texto
                width=1080,
                height=720,
                )
    # Ajustar el espaciado entre las etiquetas de los ticks del eje x
    fig.update_xaxes(dtick=1)  # Establecer dtick en 1 para mostrar todas las etiquetas
    plotly_json = fig.to_json(fig)
    plotly_json = json.loads(plotly_json)
    return extract_plotly_data(plotly_json)

#function to extract the df for analize the vs points of the players
def extract_group(df,letter):
    x_group = df[df['group'] == letter].copy()
    x_group.drop(['group', 'team_id', 'points_diff'], axis=1, inplace=True)
    x_group['team'] = x_group['team'].apply(lambda x: '-'.join(x.strip('[]').split(', ')))
    x_group.reset_index(drop=True, inplace=True)
    return x_group

#Function to return the points scored vs points received plot by the players in a json format
def plotly_plot_points(df):
    fig = go.Figure()

    # Agregar los datos de los puntos hechos al gráfico de barras
    fig.add_trace(go.Bar(
        x=df['team'],
        y=df['points_scored'],
        name='Puntos hechos',
        marker_color='#3C9145',
        text=df['points_scored'],
        textposition='auto',
    ))

    # Agregar los datos de los puntos recibidos al gráfico de barras
    fig.add_trace(go.Bar(
        x=df['team'],
        y=df['points_received'],
        name='Puntos recibidos',
        marker_color='#E61357',
        text=df['points_received'],
        textposition='auto',
    ))

    fig.update_layout(
        title='Puntos totales por equipo',
        xaxis_title='Equipo',
        yaxis_title='Puntos',
        plot_bgcolor='#000000',
        paper_bgcolor='#000000',
        font=dict(color='white'),
        width=1280,
        height=720,
    )

    # Ajustar el espaciado entre las etiquetas de los ticks del eje x
    fig.update_xaxes(dtick=1)

    plotly_json = fig.to_json()
    plotly_json = json.loads(plotly_json)
    return extract_plotly_data_points(plotly_json)

#function to return the sinergy plot in json format
# Función para extraer los datos necesarios del formato JSON de Plotly
def extract_plotly_sinergy(plotly_json):
    extracted_data = []
    for data in plotly_json["data"]:
        marker_color = data["marker"]["color"]
        text = data["text"]  # El texto ya está en formato de lista
        y = decode_bdata(data["y"]["bdata"], data["y"]["dtype"]).tolist()  # Decodificar y convertir a lista
        x = data["x"]

        extracted_data.append({
            "marker": {"color": marker_color, "cornerradius": 10},
            "text": text,
            "textposition": "auto",
            "x": x,
            "y": y,
            "type": "bar"
        })
    return {"data": extracted_data}
def plotly_plot_sinergy(df):
    # Crear una figura de Plotly
    fig = go.Figure()

    # Agregar barras para la sinergia positiva
    fig.add_trace(go.Bar(
        x=df['team'],
        y=df['sinergy'].apply(lambda x: max(x, 0)),  # Tomar solo los valores positivos
        name='Sinergia Positiva',
        marker_color='#AA12E6',  # Color para las barras positivas
        text=df['sinergy'].apply(lambda x: f'{x}%'),  # Texto que se mostrará encima de cada barra
        textposition='auto',  # Posición del texto
        textfont=dict(color='white')
    ))

    # Agregar barras para la sinergia negativa
    fig.add_trace(go.Bar(
        x=df['team'],
        y=df['sinergy'].apply(lambda x: min(x, 0)),  # Tomar solo los valores negativos
        name='Sinergia Negativa',
        marker_color='#E64912',  # Color para las barras negativas
        text=df['sinergy'].apply(lambda x: f'{x}%'),  # Texto que se mostrará encima de cada barra
        textposition='auto',  # Posición del texto
        textfont=dict(color='white')
    ))

    # Personalizar el diseño del gráfico
    fig.update_layout(
        title='Sinergia de Equipos',
        xaxis=dict(title='Equipo'),
        yaxis=dict(title='Sinergia'),
        xaxis_tickangle=-90,
        plot_bgcolor='#000000',  # Fondo negro
        paper_bgcolor='#000000',  # Fondo del área del gráfico negro
        font=dict(color='white'),  # Color del texto
        width=1280,
        height=720
    )

    fig.update_xaxes(dtick=1)
    plotly_json = fig.to_json()
    plotly_json = json.loads(plotly_json)
    return extract_plotly_sinergy(plotly_json)

#function to compare the sinergy between the two categories
def extract_plotly_compare(plotly_json):
    extracted_data = []
    for data in plotly_json["data"]:
        marker_color = data["marker"]["color"]
        text = data["text"]  # El texto ya está en formato de lista
        y = data["y"]  # Los valores de y ya están en formato de lista
        x = data["x"]

        extracted_data.append({
            "marker": {"color": marker_color, "cornerradius": 10},
            "text": text,
            "textposition": "auto",
            "x": x,
            "y": y,
            "type": "bar"
        })
    return {"data": extracted_data}

def plotly_plot_sinergy_compare(diccionario):
    # Crear la figura
    fig = go.Figure()

    # Agregar los datos al gráfico de barras
    fig.add_trace(go.Bar(
        x=['Libre', '50 y más'],
        y=[diccionario['sinergy_open'], diccionario['sinergy_senior']],
        marker_color='#E61357',  # Color de las barras
        text=[diccionario['sinergy_open'], diccionario['sinergy_senior']],  # Texto que se mostrará encima de cada barra
        textposition='auto',  # Posición del texto
    ))

    # Personalizar el gráfico
    fig.update_layout(
        title='Sinergia en ambas categorías',
        xaxis_title='Categorías',
        yaxis_title='Sinergia',
        bargap=0.4,  # Ajustar el espacio entre las barras
        plot_bgcolor='#241111',  # Fondo negro
        paper_bgcolor='#000000',  # Fondo del área del gráfico negro
        font=dict(color='white'),  # Color del texto
        width=1080,
        height=720,
    )

    # Ajustar el espaciado entre las etiquetas de los ticks del eje x
    fig.update_xaxes(dtick=1)  # Establecer dtick en 1 para mostrar todas las etiquetas

    plotly_json = fig.to_json()
    print(plotly_json)
    plotly_json = json.loads(plotly_json)
    return extract_plotly_compare(plotly_json)

def plotly_plot_points_compare(diccionario):
    # Crear la figura
    fig = go.Figure()

    # Agregar los datos al gráfico de barras
    fig.add_trace(go.Bar(
        x=['Libre', '50 y más'],
        y=[diccionario['points_open'], diccionario['points_seniors']],
        marker_color='#E61357',  # Color de las barras
        text=[diccionario['points_open'], diccionario['points_seniors']],  # Texto que se mostrará encima de cada barra
        textposition='auto',  # Posición del texto
    ))

    # Personalizar el gráfico
    fig.update_layout(
        title='Puntos en ambas categorías',
        xaxis_title='Categorías',
        yaxis_title='Sinergia',
        bargap=0.4,  # Ajustar el espacio entre las barras
        plot_bgcolor='#241111',  # Fondo negro
        paper_bgcolor='#000000',  # Fondo del área del gráfico negro
        font=dict(color='white'),  # Color del texto
        width=1080,
        height=720,
    )

    # Ajustar el espaciado entre las etiquetas de los ticks del eje x
    fig.update_xaxes(dtick=1)  # Establecer dtick en 1 para mostrar todas las etiquetas

    plotly_json = fig.to_json()
    print(plotly_json)
    plotly_json = json.loads(plotly_json)
    return extract_plotly_compare(plotly_json)