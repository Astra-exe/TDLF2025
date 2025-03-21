import Image from "next/image";
import { notFound } from "next/navigation";
import { fetchPlayerById, fetchProfile, getApiKey } from "@/app/lib/data";
import { MapPin, Anvil, Ruler, Cake } from "lucide-react";

export default async function PlayerPage(props: {
  params: Promise<{ id: string }>;
}) {
  const apiKey = await getApiKey();
  const params = await props.params;
  const id = params.id;
  const playerInfo = await fetchPlayerById({ idPlayer: id, apiKey });
  if (!playerInfo.data) {
    notFound();
  }
  const { data: profileData } = await fetchProfile({ apiKey, idPlayer: id });

  const { fullname, city, weight, height, age, experience } = playerInfo.data;
  const { position, priority, workout } = profileData;
  return (
    <main className="grid-pattern-background w-full relative overflow-hidden bg-gradient-to-b from-primary/30">
      <div className="relative z-10 w-[90%] mx-auto flex h-full flex-col py-14 px-8 justify-center">
        <div className="relative mb-12 grid gap-y-3 text-center md:text-left">
          <h1 className="font-nosifer font-bold text-3xl sm:text-4xl">
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
        <div className="max-w-4xl mx-auto">
          <article className="relative grid md:grid-cols-4 p-8 gap-y-6 md:gap-8 bg-white rounded-2xl text-dark group/card shadow-xl shadow-white/40">
            <div className="relative md:row-start-1 md:col-span-3">
              <h2 className="text-3xl sm:text-4xl font-bold">{fullname}</h2>
              <span className="sm:text-lg">{experience} años jugando</span>
            </div>
            <div className="relative mt-4 sm:mt-0 md:row-start-2 md:col-span-3">
              <h3 className="font-medium sm:text-lg">
                Recomendaciones generales:
              </h3>
              <ul className="mt-3.5 mb-2 grid gap-y-3 text-sm sm:text-base">
                <li>
                  <strong>🚩Posicion:</strong> {position}
                </li>
                <li>
                  <strong>💪Entrenamiento:</strong> {workout}
                </li>
                <li>
                  <strong>🎯Prioridad:</strong> {priority}
                </li>
              </ul>
              <p className="text-[11px] xs:text-xs text-gray-600 font-medium">
                <strong>* Nota:</strong> Estas son recomendaciones de juego y
                entrenamiento basadas en las características físicas del
                jugador. Si el estilo de juego o entrenamiento es diferente no
                tienes que seguirlas estrictamente.
              </p>
            </div>
            <div className="relative row-start-2 md:row-start-1 md:row-end-3 grid xs:grid-cols-2 md:grid-cols-1 gap-2 lg:gap-y-2.5">
              <div className="flex flex-col gap-y-1 justify-center items-center p-4 bg-primary text-white rounded-2xl">
                <MapPin size={36} />
                <strong className="sm:text-lg">{city}</strong>
              </div>
              <div className="flex flex-col gap-y-1 justify-center items-center p-4 bg-primary text-white rounded-2xl">
                <Anvil size={36} />
                <strong className="sm:text-lg">{weight} kgs</strong>
              </div>
              <div className="flex flex-col gap-y-1 justify-center items-center p-4 bg-primary text-white rounded-2xl">
                <Ruler size={36} />
                <strong className="sm:text-lg">{height} mts</strong>
              </div>
              <div className="flex flex-col gap-y-1 justify-center items-center p-4 bg-primary text-white rounded-2xl">
                <Cake size={36} />
                <strong className="sm:text-lg">{age} años</strong>
              </div>
            </div>
            <Image
              src={"/logo-black-white.svg"}
              width={600}
              height={600}
              alt="Logo Blaco-Negro TDLF-2025"
              className="pointer-events-none absolute top-1/2 left-1/2 -translate-1/2 opacity-5 invert-100"
            />
          </article>
        </div>
      </div>
      <picture className="inline-block absolute -bottom-[20%] -left-[10%]">
        <Image
          src={"/logo-black-white.svg"}
          width={700}
          height={700}
          alt="Logo Blaco-Negro TDLF-2025"
          className="opacity-25"
        />
      </picture>
    </main>
  );
}
