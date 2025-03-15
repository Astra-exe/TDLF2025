export default function CardsDashboard() {
  return (
    <>
      <Card title="Parejas categoria libre" value={12} />
      <Card title="Grupos categoria libre" value={4} />
      <Card title="Parejas categoria 50 y más" value={12} />
      <Card title="Grupos categoria 50 y más" value={4} />
    </>
  );
}

export function Card({
  title,
  value,
}: {
  title: string;
  value: number | string;
}) {
  return (
    <article className="p-2 shadow-sm rounded-xl bg-gradient-to-b from-dark/40 border border-dotted border-neutral-700/80">
      <div className="flex p-4">
        {/* {Icon ? <Icon className="h-5 w-5 text-gray-700" /> : null} */}
        <h3 className="ml-2 text-lg font-medium">{title}</h3>
      </div>
      <p className={`truncate rounded-xl px-4 py-8 text-center text-3xl`}>
        {value}
      </p>
    </article>
  );
}
