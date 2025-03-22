"use client";
import { startTransition } from "react";
import { toast } from "sonner";
import { Button } from "@/app/components/ui/button";
import { Pen } from "lucide-react";
import { createGroupsMatches } from "@/app/lib/actions";

export default function GenerateGroupsPlayers() {
  return (
    <form
      action={createGroupsMatches}
      onSubmit={(e) => {
        e.preventDefault();
        startTransition(async () => {
          try {
            await createGroupsMatches();
            toast.success("Grupos y partidos creados con exito");
          } catch (error) {
            console.log(error);
            toast.error("Error al crear grupos y partidos");
          }
        });
      }}
    >
      <Button className="cursor-pointer text-white" size={"lg"}>
        <Pen></Pen>Generar Grupos y Partidos
      </Button>
    </form>
  );
}
