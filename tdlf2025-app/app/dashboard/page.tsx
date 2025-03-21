import CardsDashboard from "@/app/components/CardsDashboard";
import { Suspense } from "react";
import { CardsSkeleton } from "@/app/components/ui/skeletons";

export default function DashboardPage() {
  return (
    <div className="w-full pt-8">
      <div className="w-[80%] mx-auto">
        <h1 className="text-3xl md:text-4xl font-bold text-center mb-10">
          Dashboard
        </h1>
        <section className="grid grid-cols-2 md:grid-cols-3 gap-4">
          <Suspense fallback={<CardsSkeleton />}>
            <CardsDashboard />
          </Suspense>
        </section>
      </div>
    </div>
  );
}
