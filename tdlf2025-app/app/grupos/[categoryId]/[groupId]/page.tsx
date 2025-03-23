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

  const rankingData = await fetchRankingByGroup({ apiKey, idGroup: groupId });

  console.log(rankingData);

  // statsByPair = {
  //   player1:
  //   player2:
  //   wins:
  //   totalPoints:
  // }

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
          {/*
          <section className="mt-20">
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
                {statsByDuo.map((statDuo: any) => (
                  <TableRow>
                    <TableCell>
                      {statDuo.player1} / {statDuo.player2}
                    </TableCell>
                    <TableCell>{statDuo.wins}</TableCell>
                    <TableCell>{statDuo.total_points}</TableCell>
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
          </section> */}
        </div>
      </main>
      <Footer />
    </div>
  );
}
