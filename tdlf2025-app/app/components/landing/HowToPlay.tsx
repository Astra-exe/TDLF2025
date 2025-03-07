import { Container, PlayCards } from "@/app/components/landing";
import Image from "next/image";
export default function HowToPlay() {
  return (
    <section className="mt-60" id="reglas">
      <Container>
        <hgroup className="text-center max-w-5xl mx-auto">
          <h3 className="text-6xl font-bold">Así se jugará</h3>
          <p className="mt-5 text-xl leading-8">
            Prepárate para{" "}
            <strong className="text-primary">
              la tercera edición del Torneo de las Fresas
            </strong>{" "}
            la competencia de frontenis que te hará sudar y disfrutar al máximo.
            A continuación, te presentamos{" "}
            <strong className="text-primary">las reglas oficiales</strong> para
            que puedas ir calentando y preparando tu estrategia
          </p>
        </hgroup>
        <div className="flex justify-center">
          <picture className="my-10 inline-block p-6 bg-dark border border-dotted border-neutral-700/80">
            <Image
              src={"/como-jugar.png"}
              alt="Match de TDLF-2024"
              width={630}
              height={425}
              className="max-w-[500px]"
            />
          </picture>
        </div>
        <PlayCards />
      </Container>
    </section>
  );
}
