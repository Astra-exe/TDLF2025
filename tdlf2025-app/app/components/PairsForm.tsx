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

import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from "@/app/components/ui/select";
import ComboBox from "./ComboBox";
import { createPair } from "@/app/lib/actions";
import { toast } from "sonner";

const pairsSchema = z.object({
  player1Id: z.string().nonempty("Jugador 1 requerido"),
  player2Id: z.string().nonempty("Jugador 2 requerido"),
  categoryId: z.string().nonempty("Categoria requerida"),
  // .length(36, { message: "Categoria no valida" }),
});

type PairsData = z.infer<typeof pairsSchema>;

const languages = [
  { label: "English", value: "en" },
  { label: "French", value: "fr" },
  { label: "German", value: "de" },
  { label: "Spanish", value: "es" },
  { label: "Portuguese", value: "pt" },
  { label: "Russian", value: "ru" },
  { label: "Japanese", value: "ja" },
  { label: "Korean", value: "ko" },
  { label: "Chinese", value: "zh" },
] as const;

export default function PairsForm() {
  // fetch the categories and the players
  const form = useForm<PairsData>({
    resolver: zodResolver(pairsSchema),
    defaultValues: {
      player1Id: "",
      player2Id: "",
      categoryId: "",
    },
  });

  const onSubmit = async (pairData: PairsData) => {
    console.log({ pairData });
    try {
      const result = pairsSchema.safeParse(pairData);
      if (!result.success) throw new Error("Invalid Data");
      // fetch to craete a new group
      const { player1Id, player2Id, categoryId } = result.data;
      toast.promise(
        createPair({
          players: [player1Id, player2Id],
          registration_category_id: categoryId,
        }),
        {
          loading: "Creando pareja...",
          success: () => "Pareja creada con éxito!",
          error: (error) => {
            if (error instanceof Error) {
              return error.message.includes("No autorizado")
                ? "Debes iniciar sesión para crear parejas"
                : error.message;
            }
            return "Error desconocido al crear la pareja";
          },
        }
      );
    } catch (error) {
      console.error("Unexpected error:", error);
      toast.error("Error inesperado al crear la pareja");
    }
    form.reset();
  };

  return (
    <div className="px-6 py-3 sm:p-12 max-w-5xl mx-auto bg-dark/30 rounded-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          <ComboBox
            labelField="Jugador 1"
            name="player1Id"
            control={form.control}
            suggestions={languages}
          />
          <ComboBox
            labelField="Jugador 2"
            name="player2Id"
            control={form.control}
            suggestions={languages}
          />
          <FormField
            control={form.control}
            name="categoryId"
            render={({ field }) => (
              <Select onValueChange={field.onChange} defaultValue={field.value}>
                <FormItem>
                  <FormLabel>Categoria</FormLabel>
                  <FormControl>
                    <SelectTrigger className="w-full">
                      <SelectValue placeholder="Selecciona la categoria" />
                    </SelectTrigger>
                  </FormControl>
                  <SelectContent>
                    <SelectItem value="open">Libre</SelectItem>
                    <SelectItem value="seniors">50 y más</SelectItem>
                  </SelectContent>
                  <FormMessage />
                </FormItem>
              </Select>
            )}
          />
          <Button
            className="cursor-pointer block ml-auto text-white mt-12"
            type="submit"
            size={"lg"}
            // aria-disabled={isPending}
          >
            Agregar Pareja
          </Button>
          {/* <div
        className="flex items-end space-x-1"
        aria-live="polite"
        aria-atomic="true"
      >
        {errorMessage && (
          <>
            <p className="text-sm text-red-500">{errorMessage}</p>
          </>
        )}
      </div> */}
        </form>
      </Form>
    </div>
  );
}
