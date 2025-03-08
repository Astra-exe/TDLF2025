export default function BentoCard({
  children,
  className,
}: {
  children: React.ReactNode;
  className?: string;
}) {
  return (
    <article
      className={`p-10 bg-white text-black rounded-lg overflow-hidden  before:absolute before:content-[''] before:block before:w-full before:h-full before:inset-0 before:-z-10 ${className}`}
      style={{
        background: `linear-gradient(90deg, hsl(210 11% 25% / 0.4) 1px, transparent 1px 10vmin) 50% -5vmin / 5vmin 5vmin, linear-gradient(hsl(210 11% 25% / 0.4) 1px, transparent 1px 10vmin) 50% -5vmin / 5vmin 5vmin, white`,
      }}
    >
      {children}
    </article>
  );
}
