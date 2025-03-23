import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import TableMatches from "@/app/components/TableMatches";
import { fetchTableMatchesByCategory } from "@/app/lib/data";
import { auth } from "@/auth";
import { columns, MatchesRow } from "@/app/components/MatchesCols";
import Link from "next/link";
import { PlusIcon } from "lucide-react";

type Player = {
  id: string;
  fullname: string;
};

type MatchPair = {
  id: string;
  players: Player[];
  score: number;
  isWinner: number;
};

type MatchByGroup = {
  id: string;
  isActive: number;
  matchCategory: {
    id: string;
    name: string;
    description: string;
  };
  matchStatus: {
    id: string;
    name: string;
    description: string;
  };
  matchPairs: MatchPair[];
};

export default async function MatchesByCategoryPage(props: {
  params: Promise<{ idCategory: string }>;
}) {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;
  const params = await props.params;
  const idCategory = params.idCategory;
  const { categoryData, matchesData } = await fetchTableMatchesByCategory({
    apiKey,
    idCategory,
  });

  const transformedDataMatches: MatchesRow[] = matchesData.flatMap((group) =>
    group.matchesInfoByCategoryByGroup.map((match: MatchByGroup) => ({
      id: match.id,
      idCategory,
      group: group.description,
      pair1: {
        id: match.matchPairs[0].id,
        players: match.matchPairs[0].players.map((player) => player.fullname),
        isWinner: match.matchPairs[0].isWinner,
      },
      pair2: {
        id: match.matchPairs[1].id,
        players: match.matchPairs[1].players.map((player) => player.fullname),
        isWinner: match.matchPairs[1].isWinner,
      },
      pointsPair1: match.matchPairs[0].score,
      pointsPair2: match.matchPairs[1].score,
    }))
  );

  return (
    <div className="w-full pt-8 pb-12">
      <div className="w-[80%] mx-auto">
        <AppBreadcrumb
          prevBreadcrumbs={[
            {
              label: "Dashboard",
              href: "/dashboard",
            },
            {
              label: "Partidos",
              href: "/dashboard/partidos",
            },
          ]}
          currentPage={`Partidos Categoria ${categoryData.description}`}
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-10 mb-7">
          Partidos Categoria {categoryData.description}
        </h1>
        <div className="mb-7 mt-4 flex items-center justify-between gap-2 md:mt-8">
          <Link
            href={`/dashboard/partidos/${idCategory}/crear`}
            className="px-4 py-3 flex items-center rounded-lg text-sm font-medium transition-colors hover:bg-dark/40 border border-gray-800"
          >
            <span className="hidden md:block">Agregar Partido</span>{" "}
            <PlusIcon className="h-5 md:ml-4" />
          </Link>
        </div>
        <TableMatches columns={columns} data={transformedDataMatches} />
      </div>
    </div>
  );
}
