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
  listPairs,
}: {
  name: string;
  listPairs: any[];
}) {
  return (
    <article
      className={`relative grid grid-cols-[0.8fr_1fr] border rounded-lg bg-gradient-to-b from-stone-800 to-black ${groupsColors[name]} hover:scale-105 hover:saturate-150 transition-[transform,filter]`}
    >
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
          {listPairs.map((pair) => {
            return (
              <li key={pair.id} className="border flex flex-col justify-center">
                <ul className="px-3 py-6 list-disc list-inside">
                  <li>{pair.player1}</li>
                  <li>{pair.player2}</li>
                </ul>
              </li>
            );
          })}
        </ul>
      </div>
    </article>
  );
}
