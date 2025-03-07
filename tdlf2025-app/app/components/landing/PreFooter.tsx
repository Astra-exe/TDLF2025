import { Merch, Container } from "@/app/components/landing";
import Image from "next/image";

export default function PreFooter() {
  return (
    <section className="pt-18 pb-24 bg-white text-dark">
      <Container>
        <div className="text-center">
          <p className="font-bold text-3xl text-primary">
            La tercera edicion esta aqui
          </p>
          <h3 className="text-5xl mt-6 font-bold">
            ¡Vuelve el torneo donde la comunidad de frontenistas se reune!
          </h3>
          <Image
            src={"/tdlf-2024.png"}
            width={1024}
            height={820}
            alt="TDLF-2024"
            className="mt-16 mb-5 max-w-[500px] mx-auto"
          />
          <p className="text-lg max-w-4xl mx-auto leading-8">
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
