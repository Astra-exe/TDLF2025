"use client";

import { useEffect } from "react";

export default function Error({
  error,
  reset,
}: {
  error: Error & { digest?: string };
  reset: () => void;
}) {
  useEffect(() => {
    // Optionally log the error to an error reporting service
    console.error(error);
  }, [error]);

  return (
    <main className="flex h-full flex-col items-center justify-center">
      <h2 className="text-center">Algo ha salido mal 😔!</h2>
      <button
        className="mt-4 rounded-md bg-primary px-4 py-2 text-sm text-white transition-colors hover:bg-primary/80"
        onClick={
          // Attempt to recover by trying to re-render the invoices route
          () => reset()
        }
      >
        Volver a intentar
      </button>
    </main>
  );
}
