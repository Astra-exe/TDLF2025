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
    <article className="max-w-3xl flex flex-col sm:flex-row items-center gap-y-3 gap-x-8 bg-dark border-2 rounded-3xl shadow-sm px-7 py-12">
      <strong className="text-3xl sm:text-4xl md:text-5xl text-nowrap">
        {time}
      </strong>
      <div className="space-y-2 text-center sm:text-left">
        <h3 className="flex flex-col text-primary font-bold text-xl sm:text-2xl">
          {title}
        </h3>
        <p className="text-lg">{copy}</p>
      </div>
    </article>
  );
}
