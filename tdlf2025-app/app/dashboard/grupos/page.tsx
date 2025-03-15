import AppBreadcrumb from "@/app/components/AppBreadcrumb";

export default function GroupsPage() {
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
        {/* Table or flipflop of Groups */}
      </div>
    </div>
  );
}
