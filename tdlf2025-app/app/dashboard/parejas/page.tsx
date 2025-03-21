import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { ButtonCreatePair } from "@/app/components/ButtonsPairs";
import { columns, PairRow } from "@/app/components/PairsCols";
import TablePairs from "@/app/components/TablePairs";
import { fetchTablePairData } from "@/app/lib/data";
import { auth } from "@/auth";

export default async function PairsPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;
  const tableData: PairRow[] = await fetchTablePairData(apiKey);

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
