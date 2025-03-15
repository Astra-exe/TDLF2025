import AppBreadcrumb from "@/app/components/AppBreadcrumb";

export default function MatchesPage() {
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
        {/* Searcher */}

        {/* Table of matches */}
      </div>
    </div>
  );
}
