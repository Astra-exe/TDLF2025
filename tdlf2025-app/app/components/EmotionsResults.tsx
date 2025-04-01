"use client";
import ReactMarkdown from "react-markdown";

const EmotionsResults = () => {
  const test = `
   ## Análisis de sentimientos de la gran final del Torneo de las fresas

**1. Resultados del Análisis de Sentimientos:**

- **Porcentaje de Positivismo:** 20%
- **Sentimiento General:** Negativo

**2. Explicación del Sentimiento General Negativo:**

El análisis de sentimientos, utilizando dos modelos de lenguaje natural (VADER y nlptown/bert-base-multilingual-uncased-sentiment), arrojó un sentimiento general negativo, a pesar de tener un 20% de positivismo. Esto puede parecer contradictorio, pero se explica por los siguientes factores:

- **VADER:** Este modelo, al analizar el texto, detectó una alta cantidad de lenguaje neutral (98.8%) y bajos niveles de sentimiento negativo (0.5%) y positivo (0.7%). Aunque el *compound score* de VADER (0.4871) sugiere un sentimiento ligeramente positivo, este valor es susceptible a ser influenciado por la gran cantidad de texto neutral.
- **Énfasis en la Tensión y la Crítica:** El texto, aunque contiene apoyo a ciertos jugadores, también revela momentos de tensión, controversia y críticas hacia decisiones arbitrales ("robo", "mala marcación"). Estas expresiones de frustración y desacuerdo contribuyen a la percepción general de un ambiente tenso y, por lo tanto, un sentimiento general negativo.
- **Contexto del Análisis:** Es crucial entender que un análisis de sentimientos no solo detecta emociones puras, sino también la intensidad y el contexto en el que se expresan. En un evento deportivo competitivo, las emociones suelen ser intensas y fluctuantes, con momentos de alegría y decepción que se entrelazan.

**3. Análisis del Texto y su Relación con el Porcentaje de Positivismo:**

El texto analizado es una transcripción de comentarios durante el partido, lo que implica:

- **Apoyo Local:** Es evidente el apoyo a jugadores como "Macizo" (Gerardo Macizo) por parte de la afición local, generando expresiones de ánimo como "Venga macizo". Este apoyo inyecta positivismo al texto.
- **Reacciones a Jugadas Controversiales:** Las jugadas dudosas ("controversia ahí último punto") y las decisiones arbitrales cuestionables ("robo ciertamente robo mala marcación juez") provocan reacciones negativas en el público, disminuyendo el sentimiento positivo general.
- **Descripción Detallada del Juego:** Gran parte del texto se dedica a describir el desarrollo del partido, los nombres de los jugadores y los marcadores. Esta información, aunque relevante, es neutral en cuanto a sentimiento, lo que diluye el impacto de las expresiones positivas.
- **Menciones a Otros Torneos y Jugadores:** La inclusión de saludos, menciones a otros torneos y jugadores, aunque amigables, no contribuyen directamente al sentimiento positivo del partido en sí.

El "20%" de positivismo refleja el apoyo a los jugadores, los comentarios sobre buenas jugadas ("Buena bola") y el entusiasmo general por el evento. Sin embargo, este positivismo se ve opacado por la tensión del juego, las controversias y la presencia de lenguaje neutral.

**4. Conclusión sobre la Reacción del Público:**

La reacción del público durante la gran final del Torneo de las Fresas fue una mezcla de entusiasmo, apoyo y frustración. Si bien hubo un fuerte respaldo a los jugadores locales, las decisiones arbitrales polémicas y la intensidad del juego generaron momentos de tensión y críticas que influyeron en el sentimiento general. El análisis de sentimientos refleja esta dualidad, mostrando un evento deportivo apasionante donde la emoción y la controversia van de la mano.

**5. Nota Adicional:** Es importante recordar que un análisis de sentimientos es una herramienta que proporciona una visión general. Para comprender completamente la reacción del público, sería necesario complementar este análisis con otros métodos, como encuestas o entrevistas, que permitan profundizar en las emociones y percepciones de los asistentes.
`;

  return (
    <div className="p-6 xs:p-8 max-w-4xl rounded-3xl overflow-hidden mx-auto bg-white text-black">
      {/* Rendered Markdown */}
      <article className="prose-sm sm:prose w-full max-w-[90%] mx-auto">
        <ReactMarkdown>{test}</ReactMarkdown>
      </article>
    </div>
  );
};

export default EmotionsResults;
