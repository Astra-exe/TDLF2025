"use client";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { Button } from "@/app/components/ui/button";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/app/components/ui/form";
import { updateMatchScorePair } from "@/app/lib/actions";
import { toast } from "sonner";
import { Input } from "./ui/input";
import { Switch } from "./ui/switch";

const matchEditSchema = z.object({
  score: z.coerce.number().int().gte(0).lte(10),
  isWinner: z.boolean(),
});

type MatchScoreData = z.infer<typeof matchEditSchema>;

export default function MatchEditForm({
  idPair,
  idMatch,
  score,
  isWinner,
  idCategory,
}: {
  idPair: string;
  idCategory: string;
  idMatch: string;
  score: number;
  isWinner: boolean;
}) {
  const form = useForm<MatchScoreData>({
    resolver: zodResolver(matchEditSchema),
    defaultValues: {
      score: score,
      isWinner: isWinner,
    },
  });

  const onSubmit = async (pairData: MatchScoreData) => {
    try {
      const result = matchEditSchema.safeParse(pairData);
      if (!result.success) throw new Error("Invalid Data");

      const { score, isWinner } = result.data;

      toast.promise(
        updateMatchScorePair({
          idPair,
          matchId: idMatch,
          idCategory,
          updateMatchData: {
            score,
            is_winner: isWinner,
          },
        }),
        {
          loading: "Actualizando score de pareja...",
          success: () => "Score actualizado con éxito!",
          error: (error) => {
            if (error instanceof Error) {
              return error.message.includes("No autorizado")
                ? "Debes iniciar sesión para crear parejas"
                : error.message;
            }
            return "Error desconocido al actualizar el score de pareja";
          },
        }
      );
    } catch (error) {
      console.error("Unexpected error:", error);
      toast.error("Error inesperado al actualizar el score de pareja");
    }
  };

  return (
    <div className="px-6 py-3 sm:p-12 max-w-5xl mx-auto bg-dark/30 rounded-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          {/* Campo para el score */}
          <FormField
            control={form.control}
            name="score"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Score</FormLabel>
                <FormControl>
                  <Input placeholder="Score" {...field} />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />

          {/* Campo para isWinner */}
          <FormField
            control={form.control}
            name="isWinner"
            render={({ field }) => (
              <FormItem>
                <FormLabel>¿Es ganador?</FormLabel>
                <FormControl>
                  <Switch
                    checked={field.value}
                    onCheckedChange={field.onChange}
                  />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <Button
            className="cursor-pointer block ml-auto text-white mt-12"
            type="submit"
            size={"sm"}
          >
            Guardar Cambios
          </Button>
        </form>
      </Form>
    </div>
  );
}
