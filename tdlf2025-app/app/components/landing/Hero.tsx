import Image from "next/image";

export default function Hero() {
  return (
    <main className="relative -mt-[100px] flex flex-col items-center overflow-hidden pt-[23vh] pb-[25vh]">
      <div className="-z-10 absolute  inset-0 grid grid-cols-[repeat(auto-fit,minmax(200px,1fr))] gap-2 bg-linear-180 from-black via-accent to-primary [&>div]:w-full [&>div]:aspect-square [&>div]:rounded-md [&>div]:bg-primary/10">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
      <div className="relative">
        <Image
          src={"/logo.png"}
          width={684}
          height={684}
          alt="Logo TDLF-2025"
          className="max-w-[280px] blur-lg absolute top-0 left-0"
        />
        <Image
          src={"/logo.png"}
          width={684}
          height={684}
          alt="Logo TDLF-2025"
          className="max-w-[280px] relative"
        />
      </div>
      <div className="mt-12">
        <h1 className="flex flex-col gap-y-7 text-7xl text-center leading-32 ">
          <span className="font-nosifer">
            Torneo de las{" "}
            <strong className="text-primary saturate-200">Fresas</strong>
          </span>
          <span className="text-6xl font-medium">Tercera edición - 2025</span>
        </h1>
      </div>
    </main>
  );
}
