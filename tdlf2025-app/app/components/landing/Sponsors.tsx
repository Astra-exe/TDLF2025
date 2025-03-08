import Container from "./Container";
import Image from "next/image";
import sponsorsData from "@/app/data/sponsors.json";

export default function Sponsors() {
  return (
    <section className="mt-48 lg:mt-60" id="patrocinadores">
      <Container>
        <hgroup className="text-center max-w-4xl mx-auto">
          <h3 className="font-bold text-4xl sm:text-5xl lg:text-6xl">
            Patrocinadores
          </h3>
          <p className="mt-5 text-base xs:text-lg sm:leading-8  sm:text-xl">
            Agradecemos la confianza de los que hacen que este proyecto se lleve
            a cabo.
          </p>
        </hgroup>
        <ul className="mt-8 md:mt-16 grid xs:grid-cols-2 justify-center gap-x-4 gap-y-3 sm:gap-y-5 md:flex md:flex-wrap md:justify-center">
          {sponsorsData.map((sponsor) => {
            return (
              <li key={sponsor.name}>
                <a
                  href={sponsor.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="min-w-[200px] max-h-40 aspect-square px-8 py-10 w-full relative flex justify-center items-center overflow-hidden rounded-xl group transition-all before:w-full before:h-[1px] before:bottom-0 before:left-0 before:absolute before:bg-gradient-to-r before:from-transparent before:via-midu-primary before:to-transparent before:scale-x-0 hover:before:scale-x-100 before:transition-all before:opacity-0 hover:before:opacity-100 before:duration-500 after:w-full after:h-1/2 after:rounded-[50%] after:left-0 after:bottom-0 after:absolute after:-z-10 after:bg-[radial-gradient(#E61357_0%,transparent_80%)] after:opacity-0 after:blur-lg hover:after:opacity-50 after:transition-all after:duration-500 after:translate-y-full hover:after:translate-y-1/2 max-w-80"
                  title={sponsor.name}
                >
                  <Image
                    src={sponsor.image}
                    width={300}
                    height={150}
                    alt={`Logo ${sponsor.name}`}
                    className="max-w-full"
                  />
                </a>
              </li>
            );
          })}
        </ul>
      </Container>
    </section>
  );
}
