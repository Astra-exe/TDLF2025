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
/**
 *
    Implementing authentication and authorization in Next.js using NextAuth without custom hooks involves leveraging server actions and Middleware for route protection. Here’s a step-by-step guide on how to achieve this while handling API key expiration:

    Step 4: Handle API Key Expiration
To handle API key expiration, you can implement a refresh mechanism. This might involve calling your PHP API periodically to obtain a new API key and updating the user's session accordingly.

    async function refreshApiKey(session) {
  const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/auth/login`;
  const res = await fetch(url, {
    method: 'POST',
    body: JSON.stringify({ nickname: session.user.nickname, password: session.user.password }),
    headers: {
      "Content-Type": "application/json"
    }
  });

  const data = await res.json();

  if (res.ok && data.data.api_key) {
    return data.data.api_key;
  }

  throw new Error('Failed to refresh API key');
}

Step 5: Integrate Refresh Logic
To integrate the refresh logic, you can modify your server actions to check if the API key is about to expire and refresh it if necessary.

    export async function GET() {
  const session = await getServerSession(authOptions);

  if (!session) {
    return new Response('Unauthorized', { status: 401 });
  }

  // Check if API key is about to expire and refresh if necessary
  if (session.user.apiKeyExpiresIn < 60) { // Assuming apiKeyExpiresIn is in seconds
    try {
      const newApiKey = await refreshApiKey(session);
      session.user.apiKey = newApiKey;
    } catch (error) {
      console.error('Failed to refresh API key:', error);
      return new Response('Failed to refresh API key', { status: 500 });
    }
  }

  // Fetch data from your PHP API using the API key
  const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/players`;
  const res = await fetch(url, {
    headers: {
      'Authorization': `Bearer ${session.user.apiKey}`,
    }
  });

  if (res.ok) {
    const data = await res.json();
    return new Response(JSON.stringify(data), {
      headers: {
        'Content-Type': 'application/json',
      },
    });
  }

  return new Response('Failed to fetch data', { status: 500 });
}

 */
