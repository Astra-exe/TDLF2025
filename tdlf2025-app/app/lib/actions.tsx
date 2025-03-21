"use server";

import { signIn, signOut, auth } from "@/auth";
import { AuthError } from "next-auth";
import type { Player, Pair } from "./definitions";
import { revalidatePath } from "next/cache";

type Credentials = {
  username: string;
  password: string;
};

type NewPlayer = Omit<Player, "id" | "is_active" | "created_at" | "updated_at">;
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
    // fetch to create it
    console.log("autorizado create player");
    // console.log({ playerData, session });
    const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/players`;
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(playerData),
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": session.user.apiKey,
      },
    });
    // console.log({ response });
    if (!response.ok) {
      const errorData = await response.json();
      console.log(errorData);
      throw new Error(
        errorData?.description || "Error al obtener al crear al juagador"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function createPair(pairData: NewPair) {
  // console.log({ pairData });
  try {
    const session = await auth();
    // console.log({ session });
    if (!session?.user) {
      throw new Error("No autorizado");
    }
    console.log("autorizado create pair");
    // fetch to create it
    const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/pairs`;
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(pairData),
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": session.user.apiKey,
      },
    });
    console.log({ response });

    if (!response.ok) {
      const errorData = await response.json();
      throw new Error(errorData?.description || "Error al crear la pareja");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    if (error instanceof Error) {
      throw error;
    }
    throw new Error("Error desconocido al crear la pareja");
  }
}

export async function deletePlayerById(id: string) {
  try {
    const session = await auth();
    // console.log({ session });
    if (!session?.user) {
      throw new Error("No autorizado");
    }

    const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/players/${id}`;
    const response = await fetch(url, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": session.user.apiKey,
      },
    });
    if (!response.ok) {
      const errorData = await response.json();
      console.log(errorData);
      throw new Error(errorData?.description || "Error al eliminar el jugador");
    }
    const dataPlayerRemoved = await response.json();
    revalidatePath("/dashboard/jugadores");
    return dataPlayerRemoved;
  } catch (error) {
    throw error;
  }
}

export async function deletePairById(id: string) {
  try {
    const session = await auth();
    // console.log({ session });
    if (!session?.user) {
      throw new Error("No autorizado");
    }

    const url = `${process.env.NEXT_PUBLIC_API_URL}/v1/pairs/${id}`;
    const response = await fetch(url, {
      method: "DELETE",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": session.user.apiKey,
      },
    });
    if (!response.ok) {
      const errorData = await response.json();
      console.log(errorData);
      throw new Error(errorData?.description || "Error al eliminar la pareja");
    }
    const dataPairRemoved = await response.json();
    revalidatePath("/dashboard/parejas");
    return dataPairRemoved;
  } catch (error) {
    throw error;
  }
}
