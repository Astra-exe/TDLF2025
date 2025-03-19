import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import PairsForm from "@/app/components/PairsForm";
import { Player } from "@/app/lib/definitions";
import { fetchAllPlayers, fetchCategories } from "@/app/lib/data";
import { auth } from "@/auth";

export default async function CreatePairsPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user.apiKey;

  const playersData: Player[] = await fetchAllPlayers(apiKey);
  const categoriesData = await fetchCategories(apiKey);

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
          currentPage="Crear Parejas"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-5 mb-7">
          Crear Parejas
        </h1>
        <PairsForm
          playersList={playersData}
          categoriesList={categoriesData.data}
        />
      </div>
    </div>
  );
}
