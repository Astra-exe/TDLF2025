import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import PairEditForm from "@/app/components/PairEditForm";
import {
  fetchAllPlayers,
  fetchCategories,
  fetchPairById,
  fetchPairPlayersById,
  getApiKey,
} from "@/app/lib/data";
import { Player } from "@/app/lib/definitions";
import { notFound } from "next/navigation";
// import { notFound } from "next/navigation";

export default async function EditPairPage(props: {
  params: Promise<{ id: string }>;
}) {
  const params = await props.params;
  const id = params.id;
  const apiKey = await getApiKey();
  const pairInfo = await fetchPairById({ apiKey, idPair: id });
  if (!pairInfo) {
    notFound();
  }

  const playersData: Player[] = await fetchAllPlayers(apiKey);
  const categoriesData = await fetchCategories(apiKey);
  const { data: players } = await fetchPairPlayersById({ apiKey, idPair: id });
  const playersIds = players.map(({ player }: { player: Player }) => {
    return {
      idPlayer: player.id,
    };
  });
  const pair = {
    id,
    categoryId: pairInfo.data.registration_category.id,
    playersIds: playersIds,
  };

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
              label: "Parejas",
              href: "/dashboard/parejas",
            },
          ]}
          currentPage="Editar Pareja"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-5 mb-7">
          Editar Pareja
        </h1>
        {/* form */}
        <PairEditForm
          pair={pair}
          playersList={playersData}
          categoriesList={categoriesData.data}
        />
      </div>
    </div>
  );
}
