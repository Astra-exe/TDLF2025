import { Merch, Container } from "@/app/components/landing";
import Image from "next/image";

export default function PreFooter() {
  return (
    <section className="mt-40 pt-18 pb-24 bg-white text-dark">
      <Container>
        <div className="text-center">
          <p className="font-bold text-2xl sm:text-3xl text-primary">
            La tercera edicion esta aqui
          </p>
          <h3 className="mt-6 font-bold text-4xl sm:text-5xl">
            ¡Vuelve el torneo donde la comunidad de frontenistas se reune!
          </h3>
          <Image
            src={"/tdlf-2024.png"}
            width={1024}
            height={820}
            alt="TDLF-2024"
            className="mt-16 mb-5 w-full h-full max-w-[380px] sm:max-w-[500px] object-cover mx-auto"
          />
          <p className="max-w-4xl mx-auto leading-6 sm:leading-8 sm:text-lg">
            No puedes dejar pasar la oportunidad de lucir tu pasión por este
            emocionante deporte. Te invitamos a adquirir nuestra merch oficial:
            ¡playeras y gorras diseñadas especialmente para este evento!
          </p>
        </div>
        <Merch />
      </Container>
    </section>
  );
}
