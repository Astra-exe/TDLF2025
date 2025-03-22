import Link from "next/link";

const groupsColors: Record<string, string> = {
  A: "hover:from-red-900",
  B: "hover:from-yellow-900",
  C: "hover:from-emerald-900",
  D: "hover:from-cyan-900",
  E: "hover:from-rose-900",
  F: "hover:from-amber-900",
  G: "hover:from-teal-900",
  H: "hover:from-violet-900",
  I: "hover:from-teal-950",
  J: "hover:from-fuchsia-950",
  K: "hover:from-indigo-950",
  L: "hover:from-orange-950",
};

export default function Group({
  name,
  categoryId,
  groupId,
  listPairs,
}: {
  name: string;
  categoryId: string;
  groupId: string;
  listPairs: {
    pair: {
      id: string;
    };
    players: {
      id: string;
      fullname: string;
    }[];
  }[];
}) {
  return (
    <article
      className={`relative grid grid-cols-[0.8fr_1fr] border rounded-lg bg-gradient-to-b from-stone-800 to-black ${groupsColors[name]} hover:scale-105 hover:saturate-150 transition-[transform,filter]`}
    >
      <Link
        href={`/grupos/${categoryId}/${groupId}`}
        className="absolute block inset-0 z-20"
        title={`Ver enfretamientos del Grupo ${name}`}
      ></Link>
      <div className="absolute inset-0 h-full w-full bg-[radial-gradient(#ffffff35_1px,transparent_1px)] [background-size:14px_14px]"></div>
      <div className="flex justify-center items-center">
        <h2 className="text-3xl text-center font-bold">
          Grupo
          <br />
          <span>{name}</span>
        </h2>
      </div>
      <div>
        <ul className="grid grid-rows-3 h-full">
          {listPairs.map((pairItem) => {
            const [player1, player2] = pairItem.players;
            return (
              <li
                key={pairItem.pair.id}
                className="border flex flex-col justify-center"
              >
                <ul className="px-3 py-6 list-disc list-inside">
                  <li>{player1.fullname}</li>
                  <li>{player2.fullname}</li>
                </ul>
              </li>
            );
          })}
        </ul>
      </div>
    </article>
  );
}
