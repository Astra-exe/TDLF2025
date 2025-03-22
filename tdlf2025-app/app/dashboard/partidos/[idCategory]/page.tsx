import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import { fetchTableMatchesByCategory } from "@/app/lib/data";
import { auth } from "@/auth";

export default async function MatchesByCategoryPage(props: {
  params: Promise<{ idCategory: string }>;
}) {
  const session = await auth();
  if (!session?.user || !session?.user?.apiKey) {
    throw new Error("No autorizado");
  }
  const apiKey = session.user?.apiKey;
  const params = await props.params;
  const idCategory = params.idCategory;
  const { categoryData, matchesData } = await fetchTableMatchesByCategory({
    apiKey,
    idCategory,
  });

  // const tableMatchesData =

  // id: string;
  // group: string;
  // pair1: {
  //   id: string;
  //   fullname: string;
  // }[];
  // pair2: {
  //   id: string;
  //   fullname: string;
  // }[];
  // pointsPair1: number;
  // pointsPair2: number;
  console.log(categoryData, matchesData);

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
          currentPage={`Partidos Categoria ${categoryData.description}`}
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-10 mb-7">
          Partidos Categoria {categoryData.description}
        </h1>
      </div>
    </div>
  );
}
