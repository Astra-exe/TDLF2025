import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import PairsForm from "@/app/components/PairsForm";

export default function CreatePairsPage() {
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
        <PairsForm />
      </div>
    </div>
  );
}
