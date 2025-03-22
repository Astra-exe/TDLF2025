import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { columns, PlayerRow } from "@/app/components/PlayersCols";
import TablePlayers from "@/app/components/TablePlayers";
import { fetchTablePlayerData } from "@/app/lib/data";
import { auth } from "@/auth";

export default async function PlayerPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;
  const tableData: PlayerRow[] = await fetchTablePlayerData(apiKey);
  return (
    <div className="w-full pt-8 pb-12">
      <div className="w-[80%] mx-auto">
        <AppBreadcrumb
          prevBreadcrumbs={[
            {
              label: "Juagdores",
              href: "/dashboard",
            },
          ]}
          currentPage="Parejas"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-7">
          Jugadores
        </h1>
        {/* Table of Players */}
        <TablePlayers columns={columns} data={tableData} />
      </div>
    </div>
  );
}
