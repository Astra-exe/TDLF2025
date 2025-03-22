import LoginForm from "@/app/components/LoginForm";
import SquareBackground from "@/app/components/SquareBackground";
import { Suspense } from "react";

export default function LoginPage() {
  return (
    <div className="relative w-full h-full min-h-dvh grid place-items-center overflow-hidden">
      <SquareBackground />
      <main className="px-6 py-5 max-w-5xl mx-auto sm:min-w-md md:min-w-xl">
        <h1 className="hidden xs:block text-4xl text-center font-bold mb-6 sm:text-5xl">
          Login - TDLF 2025
        </h1>
        <h1 className="xs:hidden text-4xl text-center font-bold mb-6 sm:text-5xl">
          Login
        </h1>
        <Suspense>
          <LoginForm />
        </Suspense>
      </main>
    </div>
  );
}
