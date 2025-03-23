import { notFound } from "next/navigation";
import {
  getApiKey,
  fetchMatchesPairsPlayersByGroup,
  fetchRankingByGroup,
} from "@/app/lib/data";
import Footer from "@/app/components/landing/sections/Footer";
import Match from "@/app/components/Match";
import { MatchByGroup } from "@/app/lib/definitions";
import {
  Table,
  TableBody,
  TableCaption,
  TableCell,
  TableFooter,
  TableHead,
  TableHeader,
  TableRow,
} from "@/app/components/ui/table";

type StatsByPair = {
  id: string;
  player1: string;
  player2: string;
  wins: string;
  totalPoints: string;
};

interface Player {
  id: string;
  fullname: string;
  city: string;
  weight: string;
  height: string;
  age: number;
  experience: number;
  is_active: number;
  created_at: string;
  updated_at: string;
}

interface Relationship {
  id: string;
  player_id: string;
  pair_id: string;
  created_at: string;
  updated_at: string;
}

interface PlayerWithRelationship {
  player: Player;
  relationship: Relationship;
}

interface RegistrationCategory {
  id: string;
  name: string;
  description: string;
}

interface Pair {
  id: string;
  is_eliminated: number;
  is_active: number;
  created_at: string;
  updated_at: string;
  registration_category: RegistrationCategory;
  players: PlayerWithRelationship[];
}

interface Rating {
  total_winners: string;
  total_score: string;
}

interface PairWithRating {
  pair: Pair;
  rating: Rating;
}

export default async function GroupPageByCategory(props: {
  params: Promise<{ categoryId: string; groupId: string }>;
}) {
  const apiKey = await getApiKey();
  const params = await props.params;
  const { groupId } = params;
  const groupsByCategory: MatchByGroup = await fetchMatchesPairsPlayersByGroup({
    idGroup: groupId,
    apiKey,
  });
  if (!groupsByCategory) {
    notFound();
  }

  const { categoryData, groupData, matchesData } = groupsByCategory;

  const { data: rankingData } = await fetchRankingByGroup({
    apiKey,
    idGroup: groupId,
  });

  const statsByPair = rankingData.map((item: PairWithRating) => {
    const player1 = item.pair.players[0].player.fullname;
    const player2 = item.pair.players[1].player.fullname;
    const wins = parseInt(item.rating.total_winners);
    const totalPoints = parseInt(item.rating.total_score);

    return {
      id: item.pair.id,
      player1,
      player2,
      wins,
      totalPoints,
    };
  });

  return (
    <div>
      <main className="mb-10 grid-pattern-background w-full relative overflow-hidden bg-gradient-to-b from-primary/30">
        <div className="relative z-10 w-[90%] mx-auto flex h-full flex-col py-14 px-8 justify-center">
          <div className="relative mb-12 grid gap-y-3 text-center md:text-left">
            <h1 className="font-nosifer font-bold text-2xl sm:text-3xl">
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
          <section>
            <h2 className="text-3xl md:text-4xl xl:text-5xl text-center font-bold mb-10">
              Partidos Grupo {groupData.description} - Categoria{" "}
              {categoryData.description}
            </h2>
            <div className="grid md:grid-cols-2 xl:grid-cols-3 gap-10">
              {matchesData.map((match) => {
                return <Match key={match.id} pairs={match.matchPairs} />;
              })}
            </div>
          </section>

          <section className="mt-40">
            <h2 className="text-3xl text-center font-bold mb-4">
              Tabla de Matches
            </h2>
            <Table className="overflow-x-auto">
              <TableCaption>Lista de matches</TableCaption>
              <TableHeader>
                <TableRow>
                  <TableHead className="text-center xs:text-left text-sm xs:text-base">
                    Pareja
                  </TableHead>
                  <TableHead className="text-center xs:text-left text-sm xs:text-base">
                    Victorias
                  </TableHead>
                  <TableHead className="text-center xs:text-left text-sm xs:text-base">
                    Puntos Totales
                  </TableHead>
                </TableRow>
              </TableHeader>

              <TableBody>
                {statsByPair.map((statDuo: StatsByPair) => (
                  <TableRow key={statDuo.id}>
                    <TableCell>
                      {statDuo.player1} / {statDuo.player2}
                    </TableCell>
                    <TableCell>{statDuo.wins}</TableCell>
                    <TableCell>{statDuo.totalPoints}</TableCell>
                  </TableRow>
                ))}
              </TableBody>

              <TableFooter>
                <TableRow>
                  <TableCell colSpan={2}>Total Parejas</TableCell>
                  <TableCell>4</TableCell>
                </TableRow>
              </TableFooter>
            </Table>
          </section>
        </div>
      </main>
      <Footer />
    </div>
  );
}
