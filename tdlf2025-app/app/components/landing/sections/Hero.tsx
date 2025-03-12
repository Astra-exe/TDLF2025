import Image from "next/image";
import SquareBackground from "@/app/components/SquareBackground";

export default function Hero() {
  return (
    <main className="px-8 sm:px-0 relative -mt-[100px] flex flex-col items-center overflow-hidden pt-[20vh] pb-[18vh] sm:pt-[23vh] sm:pb-[25vh]">
      <SquareBackground />
      <div className="relative">
        <Image
          src={"/logo.png"}
          width={684}
          height={684}
          alt="Logo TDLF-2025"
          className="max-w-[190px] xs:max-w-[220px] sm:max-w-[280px] blur-lg absolute top-0 left-0"
        />
        <Image
          src={"/logo.png"}
          width={684}
          height={684}
          alt="Logo TDLF-2025"
          className="max-w-[190px] xs:max-w-[220px] sm:max-w-[280px] relative"
        />
      </div>
      <div className="mt-8 sm:mt-12">
        <h1 className="flex flex-col gap-y-7 text-[40px] text-center leading-14 xs:leading-20 xs:text-5xl sm:leading-24 lg:leading-32 sm:text-6xl lg:text-7xl">
          <span className="font-nosifer">
            Torneo de las{" "}
            <strong className="text-primary saturate-200">Fresas</strong>
          </span>
          <span className="text-3xl font-medium xs:text-4xl sm:text-5xl lg:text-6xl">
            Tercera edición - 2025
          </span>
        </h1>
      </div>
    </main>
  );
}
