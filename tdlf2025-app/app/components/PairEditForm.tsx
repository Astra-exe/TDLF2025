"use client";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { Player, Category } from "@/app/lib/definitions";
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
import ComboBox from "@/app/components/ComboBox";
import { updatePairById } from "@/app/lib/actions";
import { toast } from "sonner";

const pairsSchema = z
  .object({
    player1Id: z.string().nonempty("Jugador 1 requerido"),
    player2Id: z.string().nonempty("Jugador 2 requerido"),
    categoryId: z
      .string()
      .nonempty("Categoria requerida")
      .length(36, { message: "Categoria no valida" }),
  })
  .refine((data) => data.player1Id !== data.player2Id, {
    message: "Error, selecciona diferentes jugadores para crear una pareja",
    path: ["confirm"], // path of error
  });

type PairsData = z.infer<typeof pairsSchema>;

export default function PairsEditForm({
  pair,
  playersList,
  categoriesList,
}: {
  pair: {
    id: string;
    categoryId: string;
    playersIds: {
      idPlayer: string;
    }[];
  };
  playersList: Player[];
  categoriesList: Category[];
}) {
  const [player1, player2] = pair.playersIds;
  const form = useForm<PairsData>({
    resolver: zodResolver(pairsSchema),
    defaultValues: {
      player1Id: player1.idPlayer,
      player2Id: player2.idPlayer,
      categoryId: pair.categoryId,
    },
  });

  const updatePairByIdWithId = updatePairById.bind(null, pair.id);

  const onSubmit = async (pairData: PairsData) => {
    try {
      const result = pairsSchema.safeParse(pairData);
      if (!result.success) throw new Error("Invalid Data");
      // fetch to craete a new group
      const { player1Id, player2Id, categoryId } = result.data;
      console.log(result.data);
      updatePairByIdWithId({
        players: [player1Id, player2Id],
        registration_category_id: categoryId,
      });
    } catch (error) {
      console.error("Unexpected error:", error);
      toast.error("Error inesperado al crear la pareja");
    }
  };

  return (
    <div className="px-6 py-3 sm:p-12 max-w-5xl mx-auto bg-dark/30 rounded-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          <ComboBox
            labelField="Jugador 1"
            name="player1Id"
            control={form.control}
            suggestions={playersList}
          />
          <ComboBox
            labelField="Jugador 2"
            name="player2Id"
            control={form.control}
            suggestions={playersList}
          />
          <FormField
            control={form.control}
            name="categoryId"
            render={({ field }) => (
              <Select onValueChange={field.onChange} value={field.value}>
                <FormItem>
                  <FormLabel>Categoria</FormLabel>
                  <FormControl>
                    <SelectTrigger className="w-full">
                      <SelectValue placeholder="Selecciona la categoria" />
                    </SelectTrigger>
                  </FormControl>
                  <SelectContent>
                    {categoriesList.map((category) => {
                      return (
                        <SelectItem
                          key={`category-${category.id}`}
                          value={category.id}
                        >
                          {category.description}
                        </SelectItem>
                      );
                    })}
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
            Guardar Cambios
          </Button>
        </form>
      </Form>
    </div>
  );
}
