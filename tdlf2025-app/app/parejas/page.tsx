import { columnsPublic, PairRow } from "@/app/components/PairsCols";
import TablePairs from "@/app/components/TablePairs";
import { fetchTablePairData, getApiKey } from "@/app/lib/data";
// import { auth } from "@/auth";

export default async function PairsPage() {
  const apiKey = await getApiKey();
  const tableData: PairRow[] = await fetchTablePairData(apiKey);
  return (
    <main className="grid-pattern-background w-full relative bg-gradient-to-b from-primary/30">
      <div className="relative z-10 w-[90%] mx-auto flex h-full flex-col py-14 px-8">
        <div className="relative mb-12 grid gap-y-3 text-center md:text-left">
          <h1 className="font-nosifer font-bold text-3xl sm:text-4xl">
            Torneo De Las Fresas
          </h1>
          <span className="text-xl font-bold">Tercera edición</span>
          <span
            style={{ writingMode: "vertical-rl", textOrientation: "upright" }}
            className="hidden md:inline-block absolute top-0 right-0 font-bold"
          >
            2025
          </span>
        </div>
        <section className="w-full">
          <h2 className="text-center text-4xl font-bold mb-5">
            Tabla de Parejas
          </h2>
          <div className="max-w-5xl mx-auto p-8 bg-black rounded-2xl">
            <TablePairs columns={columnsPublic} data={tableData} />
          </div>
        </section>
      </div>
    </main>
  );
}
