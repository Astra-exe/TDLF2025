import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { ButtonCreatePair } from "@/app/components/ButtonsPairs";
import { columns, PairRow } from "@/app/components/PairsCols";
import TablePairs from "@/app/components/TablePairs";
import { fetchPairs, fetchPairById } from "@/app/lib/data";
import type { PairsPlayers } from "@/app/lib/definitions";
import { auth } from "@/auth";

export default async function PairsPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;

  const { data: dataPairs } = await fetchPairs(apiKey);
  const tableDataPromises = dataPairs.map(async (pairData: PairsPlayers[]) => {
    const [player1Info, player2Info] = pairData;
    const idPair = player1Info.relationship.pair_id;
    const pairInfo = await fetchPairById({ idPair, apiKey });

    return {
      id: idPair,
      player1: player1Info?.player?.fullname ?? "No reconocido",
      player2: player2Info?.player?.fullname ?? "No reconocido",
      category:
        pairInfo?.data?.registration_category?.description ?? "Sin categoria",
    };
  });
  const tableData: PairRow[] = await Promise.all(tableDataPromises);

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
          currentPage="Parejas"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-7">
          Parejas
        </h1>
        {/* Create button and searchBAR*/}
        <div className="mb-7 mt-4 flex items-center justify-between gap-2 md:mt-8">
          {/* <Search placeholder="Search invoices..." /> */}
          <ButtonCreatePair />
        </div>
        {/* Table of Pairs */}
        <TablePairs columns={columns} data={tableData} />
        {/* Pagination */}
      </div>
    </div>
  );
}
