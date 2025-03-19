import NextAuth from "next-auth";
import Credentials from "next-auth/providers/credentials";
import { authConfig } from "./auth.config";
import { z } from 'zod'
import type { UserSession } from '@/app/lib/definitions'


async function authLogin(username: string, password: string):  Promise<UserSession | undefined> {
  console.log('executing authLogin fn')
  const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/auth/login`;
  try {
    const response = await fetch(url, {
      method: 'POST',
      body: JSON.stringify({
        nickname: username,
        password: password
      }),
      headers: {
        "Content-Type": "application/json"
      }
    })
    // console.log({response})
    const { data } = await response.json()

    if(response.ok && data.api_key) {
      return {
        id: '1',
        username,
        password,
        apiKey: data.api_key,
        expiresAt: Date.now() + (8 * 60 * 1000)
      }
    }
  } catch (error) {
    console.error('Failed to fetch user:', error);
    throw new Error('Failed to fetch user.');
  }
}



export const {auth, signIn, signOut} = NextAuth({
  ...authConfig,
  providers: [Credentials({
    name: 'Credentials',
    credentials: {
      username: {
        label: 'Username',
        type: 'text'
      },
      password: {
        label: 'Password',
        type: 'password'
      }
    },
    async authorize(credentials) {
      const parsedCredentials = z
        .object({ username: z.string().min(2), password: z.string().min(8) })
        .safeParse(credentials);

        if(parsedCredentials.success) {
          const { username, password } = parsedCredentials.data;
          const user = await authLogin(username, password)
          return user ?? null
        }
        console.log('Invalid credentials');
        return null
    },
  })],
  callbacks: {
    async jwt({ token, user }) {
      // Add the API key to the JWT token
      console.log('jwt function')
      if (user) {
        token.user = user;
      }

      // Check if the API key has expired
      if (token.user.expiresAt && Date.now() > token.user.expiresAt) {
        // console.log('API key expired, refreshing...');
        const refreshedToken = await authLogin(token.user.username as string, token.user.password as string);
        if (refreshedToken) {
          token.user.apiKey = refreshedToken.apiKey;
          token.user.expiresAt = refreshedToken.expiresAt;
        } else {
          console.error('Failed to refresh API key');
          return { ...token, error: 'RefreshApiKeyError' }; // Handle error gracefully
        }
      }
      // console.log({tokenFinal: token})
      return token;
    },
    async session({ session, token }) {
      // Add the API key to the session
      if (token.user) {
        session.user = token.user as string;
      }
      return session;
    },
  },
  session: {
    strategy: "jwt",
  },
  secret: process.env.AUTH_SECRET
})