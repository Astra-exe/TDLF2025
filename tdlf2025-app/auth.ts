import NextAuth from "next-auth";
import Credentials from "next-auth/providers/credentials";
import { authConfig } from "./auth.config";
import { z } from 'zod'
import type { User } from '@/app/lib/definitions'

async function authLogin(username: string, password: string):  Promise<User | undefined> {
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
    console.log({response})
    const { data } = await response.json()

    if(response.ok && data.api_key) {
      return {
        id: '1',
        username,
        apiKey: data.api_key
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
      if (user) {
        token.user = user;
      }
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