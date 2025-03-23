# Description: This file contains the functions to extract features from the data.

# Required Libraries
import pandas as pd

import folium
from folium.plugins import HeatMap
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

#Function to clear cache
def clear_cache():
    cache_path = "coords_cache.json"
    if Path(cache_path).exists():
        Path(cache_path).unlink()
        return "Cache borrado con éxito"
    return "No se encontró caché para borrar"

