import { Container, BentoCard } from "@/app/components/landing";
import Image from "next/image";

export default function NeedToKnow() {
  return (
    <Container className="mt-32">
      <section className="text-white">
        <h3 className="text-6xl font-bold text-center">
          Lo que necesitas saber
        </h3>
        <div className="mt-12 grid grid-cols-2 md:grid-cols-10 md:grid-rows-[repeat(3,auto)] gap-2 lg:gap-3">
          <BentoCard className="relative col-span-5 flex justify-between items-center">
            <h4 className="flex flex-col gap-y-2 font-bold text-5xl">
              <span>Dos</span>
              <span>Categorias</span>
            </h4>
            <Image
              src={"/raqueta.png"}
              alt="Raqueta de Frontenis"
              width={263}
              height={263}
              className="max-w-[180px]"
            />
          </BentoCard>
          <BentoCard className="col-span-5 relative">
            <Image
              src={"/categoria.png"}
              alt="Raqueta tomada por un jugador"
              width={263}
              height={263}
              className="absolute left-0 top-0"
            />
            <div className="h-full flex flex-col justify-between">
              <div className="relative flex items-center gap-x-2 justify-center">
                <span className="text-primary">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M21 9a1 1 0 0 1 1 1a1 1 0 0 1-1 1h-4.47l-.13 1.21l-2.2 4.94c-.2.5-.73.85-1.34.85H8.5c-.8 0-1.5-.73-1.5-1.5V10c0-.39.16-.74.43-1l4.2-4.9l.77.74c.2.19.32.45.32.74l-.03.22L11 9zM2 18v-8h3v8z"
                    />
                  </svg>
                </span>
                <span className="text-5xl font-medium">Libre</span>
              </div>
              <div className="relative flex items-center gap-x-2 justify-end">
                <span className="text-primary">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="32"
                    height="32"
                    viewBox="0 0 24 24"
                  >
                    <path
                      fill="currentColor"
                      d="M21 9a1 1 0 0 1 1 1a1 1 0 0 1-1 1h-4.47l-.13 1.21l-2.2 4.94c-.2.5-.73.85-1.34.85H8.5c-.8 0-1.5-.73-1.5-1.5V10c0-.39.16-.74.43-1l4.2-4.9l.77.74c.2.19.32.45.32.74l-.03.22L11 9zM2 18v-8h3v8z"
                    />
                  </svg>
                </span>
                <span className="text-5xl font-medium">50 y más</span>
              </div>
            </div>
          </BentoCard>
          <BentoCard className="col-span-6 relative">
            <Image
              src={"/inscripcion.png"}
              alt="Jugadores jugando"
              width={240}
              height={315}
              className="max-w-[180px] absolute bottom-0 right-0"
            />
            <div className="w-[70%]">
              <h4 className="text-5xl font-bold relative">Inscripción</h4>
              <ul className="mt-5 text-xl list-disc list-inside space-y-3">
                <li>
                  El costo de la inscripción por persona es de{" "}
                  <strong className="text-primary">$350 MXN</strong>
                </li>
                <li>Incluye zona de refrigerios y comida</li>
              </ul>
            </div>
          </BentoCard>
          <BentoCard className="col-span-4 row-span-2">
            <h4 className="text-5xl font-bold">Grupos y Parejas</h4>
            <ul className="mt-7 mb-5 list-disc space-y-3 text-lg">
              <li>
                El número de parejas proyectadas (esto puede cambiar) en la
                categoria libre será de 24. Teniendo 6 grupos con 4 parejas cada
                uno.
              </li>
              <li>
                El número de parejas proyectadas (esto puede cambiar) en la
                categoria de 50 y más sera de 12. Teniendo 4 grupos con 3
                parejas cada uno.
              </li>
            </ul>
            <Image
              src={"/pelotas.png"}
              alt="Pelotas de Frontenis"
              width={270}
              height={225}
              className="max-w-[180px] mx-auto"
            />
          </BentoCard>
          <BentoCard className="col-span-6">
            <h4 className="text-5xl font-bold">Cancha y Pelotas</h4>
            <ul className="mt-7 list-disc space-y-3 list-inside text-lg">
              <li>
                El número de canchas destinadas para los partidos serán 3.
              </li>
              <li>
                La pelota del torneo será HEAD o MasterPro Pre-Olímpico, sin
                embargo se hace la petición a cada pareja de llevar una bola.
              </li>
            </ul>
          </BentoCard>
        </div>
      </section>
    </Container>
  );
}
