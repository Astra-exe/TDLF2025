def playerp(height, weight, category):
    recommendations = {
        'position':None,
        'workout':None,
        'priority':None
    }

    #1th profile: Tall and thin
    if height >= 1.78 and weight <= 78:
        recommendations["position"] = "Zaguero. En el fondo con recorrido hacia media cancha para interceptar pelotas."
        recommendations["workout"] = "Trabajar fuerza en piernas y core + Ejercicios rotadores de hombros y articulaciones para prevenir lesiones."
        if category == "libre":
            recommendations["priority"] = "Enfócate en la resistencia y el desarrollo muscular. Mantente flexible y mejora los angulos de golpe."
        else:
            recommendations["priority"] = "Enfocate en la recuperación muscular y evita sobrecargas a tus articulaciones."
    
    #2nd profile: Tall and heavy
    if height >=1.78 and weight > 78:
        recommendations["position"] = "Zaguero. Al fondo a posición media para combinar alcance y potencia."
        recommendations["workout"] = "Mejorar agilidad con ejercicios de cambio de dirección. Incluye sentadillas isometricas para fortalecer articulaciones."
        if category == "libre":
            recommendations["priority"] = "Enfócate en potenciar la explosividad de tus remates. Control tu peso y trabaja en resistencia."
        else:
            recommendations["priority"] = "Reduce el impacto en tus rodillas entrenando en superficies blandas."
    
    #3rd profile: short and heavy
    if height < 1.78 and weight > 78:
        recommendations["position"] = "Delantero. Para remates rápidos, fuertes y voleas."
        recommendations["workout"] = "Trabaja agilidad y equilibrio con ejercicios de reacción. Usa voleas agresivas para definir puntos."
        if category == "libre":
            recommendations["priority"] = "Desarrolla tu potencia en piernas y brazos. Usa estrategia de juego corto."
        else:
            recommendations["priority"] = "Enfatiza movilidad articular (tobillos y cadera) y prioriza la estrategia al momento del juego."
    
    #4th profile: short and thinn
    if height < 1.78 and weight <=78:
        recommendations["position"] = "Delantero. Aprovecha tu velocidad."
        recommendations["workout"] = "Mejora tu agilidad con ejercicios de reacción. Usa golpes cortos y cambios de dirección para desequilibrio."
        if category == "libre":
            recommendations["priority"] = "Perfecciona tu técnica de golpeo y visión de juego. Aumenta tu masa muscular para ganar potencia."
        else:
            recommendations["priority"] = "Enfatiza tu movilidad y estiramiento articular para prevenir lesiones."
    return recommendations