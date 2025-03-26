import { Suspense } from "react";
import { CardsSkeleton } from "@/app/components/ui/skeletons";
import CardsStats from "@/app/components/CardsStats";
import { fetchHeatMap, getApiKey } from "@/app/lib/data";
import HeaderMap from "@/app/components/HeaderMap";
import Footer from "@/app/components/landing/sections/Footer";

export default async function StatsPage() {
  const apiKey = await getApiKey();
  const { data: dataMapContent } = await fetchHeatMap(apiKey);

  const mapFormatedContent = dataMapContent.map.replaceAll(/[+']/g, "");

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
            <h2 className="text-3xl md:text-5xl text-center font-bold mb-12 md:mb-20">
              Estadisticas Generales
            </h2>
            <section className="grid gap-y-8">
              <Suspense fallback={<CardsSkeleton />}>
                <CardsStats />
              </Suspense>
            </section>
            <section className="mt-20 text-center font-bold mb-10">
              <h2 className="mb-5 text-2xl md:text-3xl">
                Mapa de calor de origen de los participantes
              </h2>
              <div className="flex-col justify-center">
                <p className="text-medium text-base mb-5 max-w-3xl mx-auto">
                  Este mapa interactivo destaca la distribución geográfica de
                  los jugadores o parejas que participaron en el Tornero de las
                  Fresas 2025. Cada marcador de calor representa el origen de
                  los competidores, creando una visualización dinámica de la
                  participación global. Las zonas de calor se hacen más grandes
                  y faciles de vizualizar a medida de que el numero de
                  participantes de esa zona geografica fue mayor.
                </p>
                <div className="w-[80%] max-w-3xl mx-auto">
                  <HeaderMap content={mapFormatedContent} />
                </div>
              </div>
            </section>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
