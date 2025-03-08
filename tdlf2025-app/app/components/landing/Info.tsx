import { Container } from "@/app/components/landing";

export default function Info() {
  return (
    <section className="bg-primary pt-24 pb-32 text-black">
      <Container>
        <h2 className="text-center text-3xl xs:text-4xl sm:text-5xl lg:text-6lx">
          El dia que Irapuato se vuelve sede del{" "}
          <strong>frontenis de más alto nivel</strong>
        </h2>
        <div className="mt-9 flex flex-col justify-center gap-8 sm:flex-row">
          <article className="grid gap-5 border-2 px-8 py-16">
            <div className="inline-flex items-center gap-x-1.5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  fill="currentColor"
                  d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z"
                />
              </svg>
              <span className="text-xl lg:text-2xl">¿Cuándo?</span>
            </div>
            <h3 className="font-medium text-4xl lg:text-5xl">
              23 de Marzo 2025
            </h3>
            <span className="text-xl lg:text-2xl">Domingo</span>
          </article>
          <article className="grid gap-5 border-2 px-8 py-16">
            <div className="inline-flex items-center gap-x-1.5">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  fill="currentColor"
                  d="M12 3a7 7 0 0 0-7 7c0 2.862 1.782 5.623 3.738 7.762A26 26 0 0 0 12 20.758q.262-.201.615-.49a26 26 0 0 0 2.647-2.504C17.218 15.623 19 12.863 19 10a7 7 0 0 0-7-7m0 20.214l-.567-.39l-.003-.002l-.006-.005l-.02-.014l-.075-.053l-.27-.197a28 28 0 0 1-3.797-3.44C5.218 16.875 3 13.636 3 9.999a9 9 0 0 1 18 0c0 3.637-2.218 6.877-4.262 9.112a28 28 0 0 1-3.796 3.44a17 17 0 0 1-.345.251l-.021.014l-.006.005l-.002.001zM12 8a2 2 0 1 0 0 4a2 2 0 0 0 0-4m-4 2a4 4 0 1 1 8 0a4 4 0 0 1-8 0"
                />
              </svg>
              <span className="text-xl lg:text-2xl">¿Dónde?</span>
            </div>
            <h3 className="font-medium text-4xl lg:text-5xl">
              Deportiva Norte
            </h3>
            <a
              href="https://www.google.com/maps/place/Unidad+Deportiva+Mario+Vazquez+Ra%C3%B1a/@20.6944313,-101.3764419,15z/data=!4m6!3m5!1s0x842c7f9746cdae27:0x6d070463c2cb0140!8m2!3d20.6944313!4d-101.3764419!16s%2Fg%2F119tgd4jz?entry=ttu&g_ep=EgoyMDI1MDMwMi4wIKXMDSoASAFQAw%3D%3D"
              className="inline-flex gap-x-0.5 items-center text-xl lg:text-2xl underline font-medium hover:opacity-80 transition-opacity group"
              target="_blank"
              rel="nofollow"
            >
              <span>Mostrar en el mapa</span>
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                className="group-hover:translate-x-1.5 transition-all"
              >
                <path
                  fill="currentColor"
                  d="M16.175 13H5q-.425 0-.712-.288T4 12t.288-.712T5 11h11.175l-4.9-4.9q-.3-.3-.288-.7t.313-.7q.3-.275.7-.288t.7.288l6.6 6.6q.15.15.213.325t.062.375t-.062.375t-.213.325l-6.6 6.6q-.275.275-.687.275T11.3 19.3q-.3-.3-.3-.712t.3-.713z"
                />
              </svg>
            </a>
          </article>
        </div>
      </Container>
    </section>
  );
}
