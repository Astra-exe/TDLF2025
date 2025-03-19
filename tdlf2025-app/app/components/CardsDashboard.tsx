import { auth } from "@/auth";
import { fetchCardsData } from "@/app/lib/data";

export default async function CardsDashboard() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user.apiKey;
  const { numberOfPlayers, numberOfPairs } = await fetchCardsData(apiKey);
  return (
    <>
      <Card title="Categorias del torneo" value={2} />
      <Card title="Jugadores inscritos" value={numberOfPlayers} />
      <Card title="Parejas inscritas" value={numberOfPairs} />
      <Card title="Parejas categoria Libre" value={12} />
      {/* <Card title="Parejas categoria 50 y más" value={12} />
      <Card title="Grupos categoria libre" value={4} />
      <Card title="Grupos categoria 50 y más" value={4} /> */}
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
    <article className="p-2 shadow-sm rounded-xl bg-gradient-to-b from-dark/40 border border-dotted border-neutral-700/80">
      <div className="flex p-4">
        {/* {Icon ? <Icon className="h-5 w-5 text-gray-700" /> : null} */}
        <h3 className="ml-2 text-lg font-medium">{title}</h3>
      </div>
      <p className={`truncate rounded-xl px-4 py-8 text-center text-3xl`}>
        {value}
      </p>
    </article>
  );
}
