import Image from "next/image";
import Container from "./Container";

export default function Footer() {
  return (
    <footer className="py-10">
      <Container className="flex justify-between items-center">
        <div className="flex gap-x-3.5 items-center">
          <Image
            src={"/logo.png"}
            width={684}
            height={684}
            alt="Logo TDLF-2025"
            className="max-w-[80px]"
          />
          <div>
            <h4 className="text-lg font-bold">TDLF-2025</h4>
            <span>23 de Marzo 2025</span>
          </div>
        </div>
        <div className="text-sm text-right">
          <p>
            Si quieres contactar escribe al numero{" "}
            <a
              href="https://wa.me/524622883931"
              target="_blank"
              rel="noopener norefer"
              aria-label="Chat en WhatsApp"
              className="font-bold drop-shadow-custom underline"
            >
              462-288-3931
            </a>
          </p>
          <p>Desarrollado con ❤️ by Ricardo, Francisco, Juan</p>
        </div>
      </Container>
    </footer>
  );
}
