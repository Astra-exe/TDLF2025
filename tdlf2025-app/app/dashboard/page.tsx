import CardsDashboard from "@/app/components/CardsDashboard";

export default function DashboardPage() {
  return (
    <div className="w-full pt-8">
      <div className="w-[80%] mx-auto">
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-10">
          Dashboard
        </h1>
        <section className="grid grid-cols-2 gap-4">
          <CardsDashboard />
        </section>
      </div>
    </div>
  );
}
