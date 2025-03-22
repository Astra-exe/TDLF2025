import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import GenerateGroupsPlayers from "@/app/components/GenerateGroupsMatches";
import { fetchCategories, fetchGroups } from "@/app/lib/data";
import { Category } from "@/app/lib/definitions";
import { auth } from "@/auth";
import Link from "next/link";

export default async function MatchesPage() {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;
  const { pagination } = await fetchGroups(apiKey);
  const existGruops = pagination.count > 0;
  let categories = null;
  if (existGruops) {
    const { data } = await fetchCategories(apiKey);
    categories = data;
  }
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
          currentPage="Partidos"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-7">
          Partidos
        </h1>

        <section className="flex justify-center min-h-[300px] items-center gap-4 md:gap-8">
          {!existGruops ? (
            <GenerateGroupsPlayers />
          ) : (
            categories.map((category: Category) => {
              return (
                <Link
                  key={category.id}
                  href={`/dashboard/partidos/${category.id}`}
                  className="flex flex-col items-center gap-y-1.5 px-4 py-2 border bg-primary text-white font-bold hover:opacity-80 transition-colors"
                >
                  Ver Partidos Categoria {category.description}
                </Link>
              );
            })
          )}
        </section>
      </div>
    </div>
  );
}
