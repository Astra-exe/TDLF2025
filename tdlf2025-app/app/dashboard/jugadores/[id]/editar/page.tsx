import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import EditPlayerForm from "@/app/components/EditPlayerForm";
import { fetchPlayerById, getApiKey } from "@/app/lib/data";
import { Player } from "@/app/lib/definitions";
import { notFound } from "next/navigation";
// import { notFound } from "next/navigation";

export default async function EditPlayerPage(props: {
  params: Promise<{ id: string }>;
}) {
  const params = await props.params;
  const id = params.id;
  const apiKey = await getApiKey();
  const playerInfo = await fetchPlayerById({ apiKey, idPlayer: id });
  if (!playerInfo) {
    notFound();
  }

  const playerData: Player = playerInfo.data;
  console.log(playerData);
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
              label: "Jugadores",
              href: "/dashboard/jugadores",
            },
          ]}
          currentPage="Editar Juagdor"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-5 mb-7">
          Editar Jugador
        </h1>
        {/* form */}
        {playerData && <EditPlayerForm player={playerData} />}
      </div>
    </div>
  );
}
