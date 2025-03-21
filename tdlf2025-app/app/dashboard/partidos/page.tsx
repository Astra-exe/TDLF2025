import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import Match from "@/app/components/Match";

export default function MatchesPage() {
  const listMatches = [
    {
      id: "1",
      player1Pair1: "Roger Federer",
      player2Pair1: "Rafa Nadal",
      player1Pair2: "Raul Fonseca",
      player2Pair2: "Ben Shelton",
      pointsPair1: 10,
      pointsPair2: 8,
    },
    {
      id: "2",
      player1Pair1: "Roger Federer",
      player2Pair1: "Rafa Nadal",
      player1Pair2: "Raul Fonseca",
      player2Pair2: "Ben Shelton",
      pointsPair1: 10,
      pointsPair2: 5,
    },
    {
      id: "3",
      player1Pair1: "Roger Federer",
      player2Pair1: "Rafa Nadal",
      player1Pair2: "Raul Fonseca",
      player2Pair2: "Ben Shelton",
      pointsPair1: 4,
      pointsPair2: 10,
    },
  ];

  return (
    <div className="w-full pt-8 pb-12">
      <div className="w-[80%] mx-auto">
        <AppBreadcrumb
          prevBreadcrumbs={[
            {
              label: "Dashboard",
              href: "/dashboard",
            },
          ]}
          currentPage="Partidos"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-7">
          Partidos
        </h1>
        {/* Searcher */}
        <section className="grid grid-cols-2 md:grid-cols-3 gap-5">
          {listMatches.map((match) => {
            return (
              <Match
                key={match.id}
                player1Pair1={match.player1Pair1}
                player2Pair1={match.player2Pair1}
                player1Pair2={match.player1Pair2}
                player2Pair2={match.player1Pair2}
                pointsPair1={match.pointsPair1}
                pointsPair2={match.pointsPair2}
              />
            );
          })}
        </section>
      </div>
    </div>
  );
}
