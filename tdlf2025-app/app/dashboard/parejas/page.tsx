import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { ButtonCreatePair } from "@/app/components/ButtonsPairs";
import { columns, PairRow } from "@/app/components/PairsCols";
import TablePairs from "@/app/components/TablePairs";

export default async function PairsPage() {
  const data = await fetchPairs();
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
        {/* Create button and searchbAR*/}
        <div className="mb-7 mt-4 flex items-center justify-between gap-2 md:mt-8">
          {/* <Search placeholder="Search invoices..." /> */}
          <ButtonCreatePair />
        </div>
        {/* Table of Pairs */}
        <TablePairs columns={columns} data={data} />
        {/* Pagination */}
      </div>
    </div>
  );
}

// Sample data fetching function
async function fetchPairs(): Promise<PairRow[]> {
  return [
    {
      id: "1",
      player1: "Rafa Nadal",
      player2: "Roger Federer",
      category: "Libre",
    },
    {
      id: "2",
      player1: "Ben Shelton",
      player2: "Holger Rune",
      category: "Libre",
    },
  ];
}
