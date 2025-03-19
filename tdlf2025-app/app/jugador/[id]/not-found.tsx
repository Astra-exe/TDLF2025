import { Frown } from "lucide-react";
import Link from "next/link";

export default function NotFound() {
  return (
    <main className="flex min-h-screen flex-col items-center justify-center gap-2">
      <Frown className="w-10 text-gray-400" />
      <h2 className="text-xl font-semibold">404 Not Found</h2>
      <p>No se pudo encontrar el jugador</p>
      <Link
        href="/dashboard/parejas"
        className="mt-4 rounded-md bg-primary px-4 py-2 text-sm text-white transition-colors hover:bg-primary-darker"
      >
        Volver
      </Link>
    </main>
  );
}
