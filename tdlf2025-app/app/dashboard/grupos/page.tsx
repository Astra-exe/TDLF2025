import Link from "next/link";
import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { Category } from "@/app/lib/definitions";
import { auth } from "@/auth";
import { LinkIcon } from "lucide-react";
import { fetchCategories, fetchGroups } from "@/app/lib/data";
import GenerateGroupsPlayers from "@/app/components/GenerateGroupsMatches";

export default async function GroupsPage() {
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
          currentPage="Grupos"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-7">
          Grupos
        </h1>
        <section className="flex justify-center min-h-[300px] items-center gap-4 md:gap-8">
          {!existGruops ? (
            <GenerateGroupsPlayers />
          ) : (
            categories.map((category: Category) => {
              return (
                <Link
                  key={category.id}
                  href={`/grupos/${category.id}`}
                  className="flex flex-col items-center gap-y-1.5 px-4 py-2 border bg-primary text-white font-bold hover:opacity-80 transition-colors"
                >
                  Ver Grupos Categoria {category.description}
                  <LinkIcon />
                </Link>
              );
            })
          )}
        </section>
      </div>
    </div>
  );
}
