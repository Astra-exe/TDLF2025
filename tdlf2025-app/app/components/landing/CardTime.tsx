export default function CardTime({
  title,
  copy,
  time,
}: {
  title: string;
  copy: string;
  time: string;
}) {
  return (
    <article className="max-w-3xl flex items-center gap-x-8 bg-dark border-2 rounded-3xl shadow-sm px-7 py-12">
      <strong className="text-5xl text-nowrap">{time}</strong>
      <div className="space-y-2">
        <h3 className="text-2xl flex flex-col text-primary font-bold">
          {title}
        </h3>
        <p className="text-lg">{copy}</p>
      </div>
    </article>
  );
}
