import { fetchCardsData, getApiKey } from "@/app/lib/data";
const GROUPS_OPEN = 8;
const MATCHESPERGROUP = 6;
const GROUPS_SENIOR = 4;

export default async function CardsStats() {
  const apiKey = await getApiKey();
  const {
    numberOfPlayers,
    numberOfPairs,
    numberOfPairsOpen,
    numberOfPairsSenior,
  } = await fetchCardsData(apiKey);

  const matchesOpen = MATCHESPERGROUP * GROUPS_OPEN + 16 + 8 + 4 + 3;
  const matchesSenior = MATCHESPERGROUP * GROUPS_SENIOR + 8 + 4 + 3;
  return (
    <>
      <div className="grid xs:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-4">
        <Card title="Categorias del torneo" value={2} />
        <Card title="Jugadores inscritos" value={numberOfPlayers} />
        <Card title="Parejas inscritas" value={numberOfPairs} />
        <Card title="Partidos jugados" value={matchesOpen + matchesSenior} />
      </div>

      <div className="mt-10 grid xs:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
        <h3 className="font-bold text-xl sm:text-2xl text-center col-span-full">
          Categoria 50 y más
        </h3>
        <Card
          title="Jugadores categoria 50 y más"
          value={numberOfPairsSenior * 2}
        />
        <Card title="Parejas categoria 50 y más" value={numberOfPairsSenior} />
        <Card
          title="Partidos jugados categoria 50 y más"
          value={matchesSenior}
        />
      </div>

      <div className="mt-10 grid xs:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-4">
        <h3 className="font-bold text-xl sm:text-2xl text-center col-span-full">
          Categoria Libre
        </h3>
        <Card title="Jugadores categoria Libre" value={numberOfPairsOpen * 2} />
        <Card title="Parejas categoria Libre" value={numberOfPairsOpen} />
        <Card title="Partidos jugados categoria Libre" value={matchesOpen} />
      </div>
    </>
  );
}

export function Card({
  title,
  value,
}: {
  title: string;
  value: number | string;
}) {
  return (
    <article className="p-2 shadow-sm rounded-xl bg-gradient-to-br to-primary/80 via-dark/60 from-dark/40  hover:scale-105 transition-transform">
      <div className="flex p-4">
        {/* {Icon ? <Icon className="h-5 w-5 text-gray-700" /> : null} */}
        <h4 className="ml-2 xs:text-lg font-medium">{title}</h4>
      </div>
      <p className={`truncate rounded-xl px-4 py-8 text-center text-3xl`}>
        <span className="inline-block p-5 min-w-[90px] font-bold bg-white text-dark rounded-full">
          {value}
        </span>
      </p>
    </article>
  );
}
