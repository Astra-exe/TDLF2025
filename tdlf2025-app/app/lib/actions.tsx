"use server";

import { signIn, signOut } from "@/auth";
import { AuthError } from "next-auth";
import type { Player, Pair } from "./definitions";
import { auth } from "@/auth";

type Credentials = {
  username: string;
  password: string;
};

type NewPlayer = Omit<Player, "id" | "is_active">;
type NewPair = Omit<Pair, "id" | "is_eliminated">;

export async function authenticate(
  prevState: string | undefined,
  formData: Credentials
) {
  try {
    await signIn("credentials", formData);
  } catch (error) {
    if (error instanceof AuthError) {
      switch (error.type) {
        case "CredentialsSignin":
          return "Credenciales Invalidas.";
        default:
          return "Ocurrio un error, intenta más tarde";
      }
    }
    throw error;
  }
}

export async function logOut() {
  await signOut({ redirectTo: "/" });
}

export async function createPlayer(playerData: NewPlayer) {
  console.log({ playerData });
  try {
    const session = await auth();
    // console.log({ session });
    if (!session?.user) {
      throw new Error("No autorizado");
    }
    console.log("autorizado create player");
    // fetch to create it
    // const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/players`;
    // const response = await fetch(url, {
    //   method: "POST",
    //   body: JSON.stringify(playerData),
    //   headers: {
    //     "Content-Type": "application/json",
    //     X_API_KEY: session.apiKey,
    //   },
    // });
    // const data = await response.json();

    // if(response.ok) {
    //   return data
    // }
  } catch (error) {
    throw error;
  }
}

export async function createPair(pairData: NewPair) {
  console.log({ pairData });
  try {
    const session = await auth();
    // console.log({ session });
    if (!session?.user) {
      throw new Error("No autorizado");
    }
    console.log("autorizado create pair");
    // fetch to create it
    // const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/pairs`;
    // const response = await fetch(url, {
    //   method: "POST",
    //   body: JSON.stringify(pairData),
    //   headers: {
    //     "Content-Type": "application/json",
    //     X_API_KEY: session.apiKey,
    //   },
    // });

    // if(!response.ok) {
    // const errorData = await response.json();
    // throw new Error(errorData?.message || "Error al crear la pareja");
    // }
    // const data = await response.json()
    // return data
  } catch (error) {
    if (error instanceof Error) {
      throw error;
    }
    throw new Error("Error desconocido al crear la pareja");
  }
}
