import AppBreadcrumb from "@/app/components/AppBreadcrumb";
import Group from "@/app/components/Group";

export default function GroupsPage() {
  const listPairs = [
    {
      id: "1",
      player1: "Roger Federer",
      player2: "Rafa Nadal",
    },
    {
      id: "2",
      player1: "Raul Fonseca",
      player2: "Ben Shelton",
    },
    {
      id: "3",
      player1: "Sasha Zverev",
      player2: "Daniil Medvedev",
    },
  ];

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
        <section className="grid grid-cols-2 md:grid-cols-3 gap-5">
          <Group name="A" listPairs={listPairs} />
          <Group name="B" listPairs={listPairs} />
          <Group name="C" listPairs={listPairs} />
          <Group name="D" listPairs={listPairs} />
          <Group name="F" listPairs={listPairs} />
        </section>
        {/* Table or flipflop of Groups */}
      </div>
    </div>
  );
}
