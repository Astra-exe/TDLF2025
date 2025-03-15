import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import InscriptionForm from "@/app/components/InscripcionForm";

export default function InscriptionPage() {
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
          currentPage="Inscripcion"
        />
        <h1 className="text-3xl md:text-4xl font-bold text-center mt-5 mb-7">
          Inscripción de jugadores
        </h1>
        <InscriptionForm />
      </div>
    </div>
  );
}
