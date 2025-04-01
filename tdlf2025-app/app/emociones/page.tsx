import Image from "next/image";
import Footer from "@/app/components/landing/sections/Footer";
import {
  MouseFollowWrapper,
  MouseFollowCard,
} from "@/app/components/landing/MouseFollowWrapper";
import EmotionsResults from "@/app/components/EmotionsResults";

export default async function EmotionsPage() {
  return (
    <div>
      <main className="mb-10 grid-pattern-background w-full relative overflow-hidden bg-gradient-to-b from-primary/30">
        <div className="relative z-10 w-[90%] mx-auto flex h-full flex-col py-14 px-8 justify-center">
          <div className="relative mb-12 grid gap-y-3 text-center md:text-left">
            <h1 className="font-nosifer font-bold text-2xl sm:text-3xl">
              Torneo De Las Fresas
            </h1>
            <span className="text-xl font-bold">Tercera edición</span>
            <span
              style={{ writingMode: "vertical-rl", textOrientation: "upright" }}
              className="hidden md:inline-block absolute top-0 right-0 font-bold"
            >
              2025
            </span>
          </div>
          <div>
            <h2 className="text-3xl xs:text-4xl sm:text-5xl leading-10 sm:leading-14 md:leading-16 tracking-wider text-center mb-24">
              <strong className="flex flex-col lg:flex-row lg:justify-center lg:gap-x-5 relative px-2 z-10 before:content-[''] before:absolute before:w-[calc(100%_+_1.25em)] lg:before:w-[calc(100%_+_0.75em)] before:h-full before:bg-gradient-to-r before:from-primary before:to-[#810B31] before:-rotate-2 before:-left-[0.125em] before:top-0 before:-z-10">
                <span>Análisis de emociones</span>
                <span>Final TDLF</span>
              </strong>
            </h2>
            <section className="mb-12 md:mb-20">
              <div>
                <h3 className="text-center lg:text-start text-2xl sm:text-3xl font-bold">
                  Las palabras que definieron la tercera edición del Torneo De
                  Las Fresas
                </h3>
                <MouseFollowWrapper>
                  <MouseFollowCard>
                    <div className="relative z-20">
                      <h4 className="text-2xl font-bold mb-2">
                        ¿Para qué sirve?
                      </h4>
                      <ul className="grid gap-y-2.5 list-disc list-inside">
                        <li>
                          <strong>Visualizar tendencias:</strong> Las{" "}
                          <strong className="text-primary">
                            palabras más grandes son las que más se mencionaron
                          </strong>
                          , revelando los temas que dominaron la conversación
                          (ej: &quot;Macizo&quot;, &quot;bola&quot;,
                          &quot;marcador&quot;).
                        </li>
                        <li>
                          <strong>Capturar la esencia:</strong> Refleja el{" "}
                          <strong className="text-primary">
                            ambiente del evento
                          </strong>
                          , desde gritos de apoyo hasta reacciones a jugadas
                          polémicas.
                        </li>
                        <li>
                          <strong>Identificar protagonistas:</strong> ¿Se{" "}
                          <strong className="text-primary">
                            {" "}
                            habló más de un jugador
                          </strong>{" "}
                          en particular? ¿De estrategias clave? El wordcloud lo
                          muestra.
                        </li>
                      </ul>
                    </div>
                  </MouseFollowCard>
                  <MouseFollowCard>
                    <div className="relative z-20">
                      <h4 className="text-2xl font-bold mb-2">
                        ¿Qué encontrarás?
                      </h4>
                      <ul className="grid gap-y-2.5 list-disc list-inside">
                        <li>
                          <strong>Palabras clave:</strong> Términos como
                          <strong className="text-primary">
                            &quot;chapa&quot;, &quot;que bola&quot; (para
                            jugadas brillantes) o &quot;fuera&quot;
                          </strong>{" "}
                          que marcaron la final.
                        </li>
                        <li>
                          <strong>Emociones en tiempo real:</strong> ¡Vamos!,
                          ¡Fuerza!, ¡Robo!...{" "}
                          <strong className="text-primary">
                            Una radiografía del ánimo del público.
                          </strong>
                        </li>
                        <li>
                          <strong>Homenaje al torneo:</strong> Incluye
                          referencias únicas al espíritu del &quot;Torneo de las
                          Fresas&quot;, como{" "}
                          <strong className="text-primary">
                            menciones locales, saludos o apodos de los
                            jugadores.
                          </strong>
                        </li>
                      </ul>
                    </div>
                  </MouseFollowCard>
                  <MouseFollowCard>
                    <div className="relative z-20">
                      <h4 className="text-2xl font-bold mb-2">
                        ¿Por qué es relevante?
                      </h4>
                      <p>
                        Este gráfico no solo decora,{" "}
                        <strong className="text-primary">
                          cuenta la historia no escrita del partido.
                        </strong>{" "}
                        Es una herramienta para los analistas de datos,{" "}
                        <strong className="text-primary">
                          un recuerdo para los fanáticos y un tributo a la
                          pasión
                        </strong>{" "}
                        que convierte cada edición del torneo en algo
                        legendario.
                      </p>
                    </div>
                  </MouseFollowCard>
                </MouseFollowWrapper>
              </div>
              <div className="mt-5">
                <p className="font-medium text-base sm:text-lg max-w-6xl mx-auto mb-5">
                  Este wordcloud (nube de palabras) es una ventana a las
                  emociones y momentos clave vividos durante la Gran Final del
                  Torneo de las Fresas. Aquí podrás descubrir, de un vistazo,
                  las palabras más repetidas por el público, comentaristas y
                  jugadores durante el partido decisivo disputado entre la
                  pareja de{" "}
                  <strong className="bg-primary">
                    Gerardo Martinez y Jesus Arguellas y la pareja de Fernando
                    Cortez y Abimael Tapia
                  </strong>
                </p>
                <picture className="flex justify-center w-full h-full max-w-4xl mx-auto">
                  <Image
                    src={"/final-wordcloud.png"}
                    alt="Nube de palabras final TDLF 2025"
                    width={900}
                    height={768}
                    className="w-full object-contain h-full min-h-[30vh]"
                  ></Image>
                </picture>
              </div>
            </section>
            <section className="mb-12 md:mb-20">
              <h3 className="text-center lg:text-start text-2xl sm:text-3xl font-bold">
                Análisis de Sentimientos con Machine Learning: La Emoción en
                Palabras
              </h3>
              <p className="mt-3 font-medium text-sm xs:text-base sm:text-lg max-w-6xl mx-auto mb-5">
                Usando VADER y otros modelos de Inteligencia Artificial
                especializados en detectar emociones en textos, analizamos los
                gritos y comentarios del público durante la final. Este sistema,
                entrenado para capturar intensidad y contexto, reveló qué tan
                positivas, neutras o negativas fueron las reacciones ante cada
                jugada clave.
              </p>
              <EmotionsResults />
            </section>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
