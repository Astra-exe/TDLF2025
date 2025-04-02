import BarChart from "@/app/components/BarChart";
import {
  fetchCategoryById,
  fetchParitiesByCategory,
  fetchPointsChartByCategory,
  fetchSynergyByCategory,
  getApiKey,
} from "@/app/lib/data";
import Footer from "@/app/components/landing/sections/Footer";
import { notFound } from "next/navigation";
import { Suspense } from "react";

export default async function StatsCategoryPage(props: {
  params: Promise<{ categoryId: string }>;
}) {
  const apiKey = await getApiKey();
  const params = await props.params;
  const idCategory = params.categoryId;
  const categoryData = await fetchCategoryById({ apiKey, idCategory });
  if (!categoryData) {
    notFound();
  }

  const { data: category } = categoryData;
  const { data: dataParitiesByCategory } = await fetchParitiesByCategory({
    apiKey,
    idCategory,
  });
  const { data: dataSynergyByCategory } = await fetchSynergyByCategory({
    apiKey,
    idCategory,
  });

  const pointsByGroup = await fetchPointsChartByCategory({
    apiKey,
    idCategory,
  });

  const {
    data: dataParity,
    title: titleParity,
    "x-axis": xAxisParity,
    "y-axis": yAxisParity,
  } = dataParitiesByCategory;

  const {
    data: dataSynergy,
    title: titleSynergy,
    "x-axis": xAxisSynergy,
    "y-axis": yAxisSynergy,
  } = dataSynergyByCategory;

  dataSynergy[0] = {
    name: "Sinergia positiva",
    ...dataSynergy[0],
  };
  dataSynergy[1] = {
    name: "Sinergia negativa",
    ...dataSynergy[1],
  };

  return (
    <div>
      <main className="mb-10 grid-pattern-background w-full relative overflow-hidden bg-gradient-to-b to-dark/75 from-primary/30">
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
            <h2 className="text-3xl xs:text-4xl md:text-5xl leading-12 md:leading-16 tracking-wider text-center mb-10">
              <strong>
                Estadisticas Categoria{" "}
                <span className="relative px-2 z-10 before:content-[''] before:absolute before:w-[calc(100%_+_0.25em)] before:h-full before:bg-gradient-to-r before:from-primary before:to-[#810B31] before:-rotate-2 before:-left-[0.125em] before:top-0 before:-z-10">
                  {category.description}
                </span>
              </strong>
            </h2>
            <section className="grid gap-8">
              <div className="grid lg:grid-cols-2 gap-6">
                {pointsByGroup.map((pointsGroup) => {
                  const {
                    data: dataGroup,
                    title: titleGroup,
                    "y-axis": yAxisGroup,
                  } = pointsGroup;

                  return (
                    <Suspense fallback={<p>Cargando...</p>} key={titleGroup}>
                      <BarChart
                        dataChart={dataGroup}
                        titleChart={titleGroup}
                        xAxisTitle={""}
                        yAxisTitle={yAxisGroup}
                      >
                        <div className="mb-5 text-sm sm:text-base">
                          <p>
                            Compara el rendimiento ofensivo (puntos hechos) y
                            defensivo (puntos recibidos) de cada pareja en su
                            grupo.
                          </p>
                          <ul className="mt-2 mb-1 list-disc list-inside">
                            <li>Puntos hechos: Efectividad en ataque.</li>
                            <li>Puntos recibidos: Solidez defensiva.</li>
                            <li>
                              Muchos puntos hechos y muchos puntos recibidos:
                              Estilo arriesgado.
                            </li>
                            <li>
                              Pocos puntos recibidos: Buen control o rivales
                              débiles.
                            </li>
                          </ul>
                          <span className="mt-2 inline-block italic font-medium py-1.5 px-2 text-xs bg-primary text-white">
                            Pasa el mouse o da click en las barras para ver más
                            detalles de cada registro
                          </span>

                          <ul className="mt-6 text-xs sm:text-sm grid gap-y-1.5">
                            <li className="relative before:content-[''] before:absolute before:left-0 before:w-[12px] before:aspect-square before:rounded-md before:bg-[#3c9145] pl-[20px]">
                              Puntos hechos
                            </li>
                            <li className="relative before:content-[''] before:absolute before:left-0 before:w-[12px] before:aspect-square before:rounded-md before:bg-primary pl-[20px]">
                              Puntos recibidos
                            </li>
                          </ul>
                        </div>
                      </BarChart>
                    </Suspense>
                  );
                })}
              </div>
              <Suspense fallback={<p>Cargando...</p>}>
                <BarChart
                  dataChart={dataParity}
                  titleChart={titleParity}
                  xAxisTitle={xAxisParity}
                  yAxisTitle={yAxisParity}
                >
                  <div className="mb-5 text-sm sm:text-base">
                    <p>
                      Mide el equilibrio competitivo en cada grupo.{" "}
                      <strong>Cercano a cero = más parejo.</strong>
                    </p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>
                        Cerca de 0: Grupo equilibrado (resultados
                        impredecibles).
                      </li>
                      <li>Lejos de 0: Mayor dominio de algunos equipos.</li>
                    </ul>
                    <p className="text-sm">
                      Calculado con desviación estándar (std): menor valor,
                      mayor paridad.
                    </p>
                    <span className="mt-2 inline-block italic font-medium py-1.5 px-2 text-xs bg-primary text-white">
                      Pasa el mouse o da click en las barras para ver más
                      detalles de cada registro
                    </span>
                  </div>
                </BarChart>
              </Suspense>
              <Suspense fallback={<p>Cargando...</p>}>
                <BarChart
                  dataChart={dataSynergy}
                  titleChart={titleSynergy}
                  xAxisTitle={xAxisSynergy}
                  yAxisTitle={yAxisSynergy}
                >
                  <div className="mb-5 text-sm sm:text-base">
                    <p>
                      Mide el rendimiento colectivo comparando puntos ganados
                      (Ph) vs. recibidos (Pr), expresado en porcentaje.
                    </p>
                    <ul className="mt-2 mb-1 list-disc list-inside">
                      <li>
                        🔥+40% o más (Alta sinergia) → ¡Casi la excelencia! El
                        equipo domina con estrategias sólidas.
                      </li>
                      <li>
                        📈 +10% a +39% (Buena sinergia) → Hay muy buen
                        potencial, con práctica y consistencia se elevará el
                        nivel.
                      </li>
                      <li>
                        ⚖️ -10% a +10% (Ni buena, ni mala sinergia) → Partidos
                        ajustados, los detalles marcan la diferencia.
                      </li>
                      <li>
                        ⚠️ -10% a -50% (Alerta) → Patrones de error detectados.
                        Se recomienda analizar la situación.
                      </li>
                      <li>
                        🆘 -50% o menos (Sinergia crítica) → Problemas con la
                        sinergia. No quiere decir que sean malos, simplemente se
                        podrían redefinir los roles o mejorar la comunicación.
                      </li>
                    </ul>
                    <p className="text-sm">
                      <strong>Nota: </strong> El % refleja el momento actual.
                      ¡Con trabajo, puede mejorar!
                    </p>
                    <span className="mt-2 inline-block italic font-medium py-1.5 px-2  text-xs bg-primary text-white">
                      Pasa el mouse o da click en las barras para ver más
                      detalles de cada registro
                    </span>

                    <ul className="mt-6 text-xs xs:text-sm grid gap-y-1.5">
                      <li className="relative before:content-[''] before:absolute before:left-0 before:top-[20%] before:w-[12px] before:aspect-square before:rounded-md before:bg-[#aa12e6] pl-[20px]">
                        Sinergia positiva
                      </li>
                      <li className="relative before:content-[''] before:absolute before:left-0 before:top-[20%] before:w-[12px] before:aspect-square before:rounded-md before:bg-[#e64912] pl-[20px]">
                        Sinergia negativa
                      </li>
                    </ul>
                  </div>
                </BarChart>
              </Suspense>
            </section>
          </div>
        </div>
      </main>
      <Footer />
    </div>
  );
}
