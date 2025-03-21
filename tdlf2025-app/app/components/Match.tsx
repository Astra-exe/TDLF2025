interface MatchProps {
  player1Pair1: string;
  player2Pair1: string;
  player1Pair2: string;
  player2Pair2: string;
  pointsPair1: number;
  pointsPair2: number;
}
export default function Match({
  player1Pair1,
  player2Pair1,
  player1Pair2,
  player2Pair2,
  pointsPair1,
  pointsPair2,
}: MatchProps) {
  return (
    <article className="relative w-full flex flex-col items-center bg-gradient-to-b from-black bg-stone-800 border rounded-sm">
      <div className="absolute inset-0 h-full w-full bg-[radial-gradient(#ffffff35_1px,transparent_1px)] [background-size:14px_14px]"></div>
      <div
        className={`h-full items-center py-3 px-4 grid grid-cols-[1fr_auto] gap-x-5 border w-full ${
          pointsPair1 > pointsPair2 ? "bg-green-500/10" : ""
        }`}
      >
        <div className="flex items-center">
          <p className="text-sm lg:text-base">{player1Pair1}</p>
          <span className="mx-1">/</span>
          <p className="text-sm lg:text-base">{player2Pair1}</p>
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
          <p className="text-sm lg:text-base">{player1Pair2}</p>
          <span className="mx-1">/</span>
          <p className="text-sm lg:text-base">{player2Pair2}</p>
        </div>
        <span className="inline-block text-lg ml-2 justify-self-end">
          {pointsPair2}
        </span>
      </div>
    </article>
  );
}
