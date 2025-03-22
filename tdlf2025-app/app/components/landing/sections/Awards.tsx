import Image from "next/image";
import Container from "../Container";
import AwardFirst from "@/app/components/icons/AwardFirst";
import AwardSecond from "@/app/components/icons/AwardSecond";
import AwardThird from "@/app/components/icons/AwardThird";
import AwardFourth from "@/app/components/icons/AwardFourth";

export default function Awards() {
  return (
    <section className="mt-60" id="premios">
      <Container className="pt-12 pb-10 px-6 xs:px-8 bg-gradient-to-b from-primary to-primary-darker shadow-awards rounded-2xl max-w-screen-xl mx-auto">
        <hgroup className="text-center">
          <h3 className="font-bold text-4xl sm:text-5xl lg:text-6xl">
            Premios
          </h3>
          <p className="mt-3 max-w-4xl mx-auto text-base leading-5 xs:leading-8 xs:text-lg md:text-xl">
            Estamos encantados de reconocer a los destacados participantes que
            aportaran pasión, habilidad y deportividad al Torneo de las Fresas.
          </p>
        </hgroup>
        <div className="mt-9 relative grid auto-rows-max md:grid-cols-2 mx-auto max-w-screen-base gap-y-6 gap-x-5">
          <h4 className="col-span-full text-center text-2xl sm:text-3xl font-semibold">
            Categoria Libre
          </h4>
          <article className="relative flex items-center justify-center py-5 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $8,000 para el campeon
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <AwardFirst />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $4,000 para el subcampeon
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <AwardSecond />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $2,000 para el tercer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <AwardThird />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker min-h-[150px]">
            <span className="absolute w-full font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2 xs:text-lg xs:text-nowrap">
              $1,000 para el cuarto lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <AwardFourth />
            </div>
          </article>
          <h4 className="mt-8 col-span-full text-center text-2xl sm:text-3xl font-semibold">
            Categoria 50 y más
          </h4>
          <article className="row-span-2 relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Raqueta Head para el primer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/raqueta.png"}
                width={150}
                height={150}
                alt="Raqueta Head"
                className="max-w-[150px]"
              />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Maletero MasterPro para el segundo lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/maletero.webp"}
                width={150}
                height={150}
                alt="Maletero"
                className="max-w-[150px]"
              />
            </div>
          </article>
          <article className="relative flex items-center justify-center py-12 transition-all duration-500 border rounded-2xl group px-7 before:w-full before:h-full before:rounded-2xl before:backdrop-blur-md before:z-10 before:absolute before:inset-0 group bg-primary/30 border-primato-primary-darker">
            <span className="absolute w-full text-lg font-bold text-center text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-[20ch] transition-all duration-500 z-[60] group-hover:translate-y-1/2">
              Playeras conmemorativas para el tercer lugar
            </span>
            <div className="relative h-auto opacity-20 w-max rotate-6 z-50 blur-sm transition-all duration-500 group-hover:blur-none group-hover:-translate-y-1/3 group-hover:opacity-100">
              <Image
                src={"/playeras.png"}
                width={150}
                height={150}
                alt="Raqueta Head"
                className="max-w-[150px]"
              />
            </div>
          </article>
        </div>
      </Container>
    </section>
  );
}
