// types/next-auth.d.ts
import { DefaultSession } from "next-auth";

declare module "next-auth" {
  interface User {
      username?: string;
      password?: string;
      apiKey?: string;
      expiresAt?: number;
  }
  interface JWT {
      username?: string;
      password?: string;
      apiKey?: string;
      expiresAt?: number;
  }
  interface Session {
    user: {
      username?: string;
      apiKey?: string;
    } & DefaultSession['user']
  }
}