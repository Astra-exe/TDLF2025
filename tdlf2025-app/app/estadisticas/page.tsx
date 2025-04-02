import { Suspense } from "react";
import { CardsSkeleton } from "@/app/components/ui/skeletons";
import CardsStats from "@/app/components/CardsStats";
import {
  fetchCategories,
  fetchHeatMap,
  fetchPointsComparative,
  fetchSynergiesComparative,
  getApiKey,
} from "@/app/lib/data";
import HeaderMap from "@/app/components/HeaderMap";
import Footer from "@/app/components/landing/sections/Footer";
import Link from "next/link";
import { Category } from "../lib/definitions";
import BarChart from "../components/BarChart";

export default async function StatsPage() {
  const apiKey = await getApiKey();
  const { data: dataMapContent } = await fetchHeatMap(apiKey);

  const mapFormatedContent = dataMapContent.map.replaceAll(/[+']/g, "");
  const { data: categories } = await fetchCategories(apiKey);

  const { data: dataPointsComparative } = await fetchPointsComparative(apiKey);
  const { data: dataSynergiesComparative } = await fetchSynergiesComparative(
    apiKey
  );

  return (
    <div>
      <main className="mb-10 grid-pattern-background w-full relative overflow-hidden bg-gradient-to-b from-primary/30">
        <div className="relative z-10 w-[95%] xs:w-[90%] mx-auto flex h-full flex-col py-14 px-8 justify-center">
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
            <h2 className="text-3xl md:text-5xl text-center font-bold mb-12 md:mb-20">
              Estadisticas Generales
            </h2>
            <section className="grid gap-y-8">
              <Suspense fallback={<CardsSkeleton />}>
                <CardsStats />
              </Suspense>
            </section>
            <section className="mt-20 text-center mb-10">
              <h2 className="mb-5 text-2xl md:text-3xl font-bold">
                Mapa de calor de origen de los participantes
              </h2>
              <div className="flex-col justify-center">
                <p className="text-sm sm:text-base mb-5 max-w-3xl mx-auto">
                  Este mapa destaca la distribución geográfica de los jugadores
                  o parejas que participaron en el Torneo de las Fresas 2025.
                  Cada marca de calor representa el origen de los competidores,
                  donde las zonas de calor se hacen más grandes y faciles de
                  vizualizar a medida de que el numero de participantes de esa
                  zona geografica fue mayor.
                </p>
                <div className="md:w-[80%] max-w-3xl mx-auto [&>div>div>div>iframe]:h-[400px] md:[&>iframe]:h-full">
                  <HeaderMap content={mapFormatedContent} />
                </div>
              </div>
            </section>

            <section className="grid gap-y-10">
              <Suspense fallback={<p>Cargando...</p>}>
                <BarChart
                  dataChart={dataPointsComparative.data}
                  titleChart={dataPointsComparative.title}
                  xAxisTitle={dataPointsComparative["x-axis"]}
                  yAxisTitle={dataPointsComparative["y-axis"]}
                >
                  <div className="mb-5 text-sm sm:text-base">
                    <p className="font-medium">
                      Total puntos todos los grupos ÷ Número de grupos
                    </p>
                    <p>Que muestra:</p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>Promedios altos: Categorías ofensivas/dominantes</li>
                      <li>
                        Promedios bajos: Categorías defensivas/equilibradas
                      </li>
                      <li>
                        Promedios similares: Mismo ritmo de juego en todas las
                        categorías
                      </li>
                    </ul>
                    <p>Cuando son muy similares:</p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>El torneo mantiene equilibrio entre categorías</li>
                      <li>La edad/tipo no afecta la productividad</li>
                      <li>
                        Experiencia de juego consistente en todos los grupos
                      </li>
                    </ul>
                    <span className="mt-2 inline-block italic font-medium py-1.5 px-2 text-xs bg-primary text-white">
                      Pasa el mouse o da click en las barras para ver más
                      detalles de cada registro
                    </span>
                  </div>
                </BarChart>
              </Suspense>
              <Suspense fallback={<p>Cargando...</p>}>
                <BarChart
                  dataChart={dataSynergiesComparative.data}
                  titleChart={dataSynergiesComparative.title}
                  xAxisTitle={dataSynergiesComparative["x-axis"]}
                  yAxisTitle={dataSynergiesComparative["y-axis"]}
                >
                  <div className="mb-5 text-sm sm:text-base">
                    <p className="font-medium">
                      Muestra el promedio de sinergia entre ambas categorías:
                    </p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>Libre: Sin restricción de edad.</li>
                      <li>50 y más: Jugadores de 50 años o más.</li>
                    </ul>
                    <p>Interpretación:</p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>
                        Mayor sinergia en Libre: Posible mejor coordinación en
                        equipos jóvenes/mixtos.
                      </li>
                      <li>
                        Mayor sinergia en 50 y más: La experiencia compensa la
                        física.
                      </li>
                      <li>
                        Valores similares: Mismo nivel de trabajo en equipo.
                      </li>
                    </ul>
                    <span className="mt-2 inline-block italic font-medium py-1.5 px-2 text-xs bg-primary text-white">
                      Pasa el mouse o da click en las barras para ver más
                      detalles de cada registro
                    </span>
                  </div>
                </BarChart>
              </Suspense>
            </section>

            <section className="mt-20 flex flex-col xs:flex-row justify-center items-center gap-4 md:gap-8">
              {categories.map((category: Category) => {
                return (
                  <Link
                    key={category.id}
                    href={`/estadisticas/${category.id}`}
                    className="inline-block w-full sm:w-auto text-center text-sm xs:text-base gap-y-1.5 px-4 py-2 border bg-primary text-white font-bold hover:opacity-80 transition-colors"
                  >
                    Ver Estadisticas Categoria {category.description}
                  </Link>
                );
              })}
            </section>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
