import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import MatchesForm from "@/app/components/MatchesForm";
import {
  fetchAllPairs,
  fetchCategories,
  fetchMatchesCategories,
  fetchStatusCategories,
} from "@/app/lib/data";
import { auth } from "@/auth";
import { Suspense } from "react";

export default async function CreatePairsPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user.apiKey;

  const pairsList = await fetchAllPairs(apiKey);
  const { data: categoriesList } = await fetchCategories(apiKey);
  const { data: matchCategoriesList } = await fetchMatchesCategories(apiKey);
  const { data: matchStatusList } = await fetchStatusCategories(apiKey);

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
          currentPage="Crear Partidos"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-5 mb-7">
          Crear Partdidos
        </h1>
        <Suspense>
          <MatchesForm
            pairsList={pairsList}
            categoriesList={categoriesList}
            matchCategoriesList={matchCategoriesList}
            mastStatusList={matchStatusList}
          />
        </Suspense>
      </div>
    </div>
  );
}
