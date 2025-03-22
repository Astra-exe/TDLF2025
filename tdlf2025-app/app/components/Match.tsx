import Link from "next/link";

type Pair = {
  id: string;
  players: {
    id: string;
    fullname: string;
  }[];
  score: number;
};

type MatchProps = {
  pairs: Pair[];
};
export default function Match({ pairs }: MatchProps) {
  const [pair1, pair2] = pairs;
  const [player1Pair1, player2Pair1] = pair1.players;
  const pointsPair1 = pair1.score;
  const [player1Pair2, player2Pair2] = pair2.players;
  const pointsPair2 = pair2.score;

  return (
    <article className="relative w-full flex flex-col items-center bg-gradient-to-b from-black bg-stone-800 border rounded-sm">
      <div className="absolute inset-0 h-full w-full bg-[radial-gradient(#ffffff35_1px,transparent_1px)] [background-size:14px_14px]"></div>
      <div
        className={`h-full items-center py-3 px-4 grid grid-cols-[1fr_auto] gap-x-5 border w-full ${
          pointsPair1 > pointsPair2 ? "bg-green-500/10" : ""
        }`}
      >
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player1Pair1.id}`}
              className="hover:underline transition-all"
            >
              {player1Pair1.fullname}
            </Link>
          </p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player2Pair1.id}`}
              className="hover:underline transition-all"
            >
              {player2Pair1.fullname}
            </Link>
          </p>
        </div>
        <span className="inline-block text-lg ml-2 justify-self-end">
          {pointsPair1}
        </span>
      </div>
      <span className="absolute top-1/2 -translate-y-1/2 z-10 backdrop-blur-sm font-audioWide text-md sm:text-lg -skew-y-3 inline-block">
        VS
      </span>
      <div
        className={`h-full items-center py-3 px-4 grid grid-cols-[1fr_auto] gap-x-5 border w-full ${
          pointsPair2 > pointsPair1 ? "bg-green-500/10" : ""
        }`}
      >
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player1Pair2.id}`}
              className="hover:underline transition-all"
            >
              {player1Pair2.fullname}
            </Link>
          </p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player2Pair2.id}`}
              className="hover:underline transition-all"
            >
              {player2Pair2.fullname}
            </Link>
          </p>
        </div>
        <span className="inline-block text-lg ml-2 justify-self-end">
          {pointsPair2}
        </span>
      </div>
    </article>
  );
}
