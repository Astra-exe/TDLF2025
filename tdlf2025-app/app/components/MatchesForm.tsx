"use client";
import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { Category } from "@/app/lib/definitions";
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
import { createMatch } from "@/app/lib/actions";
import { toast } from "sonner";

const matchesSchema = z.object({
  categoryId: z
    .string()
    .nonempty("Categoria requerida")
    .length(36, { message: "Categoria no valida" }),
  matchStatus: z
    .string()
    .nonempty("Match Status requerido")
    .length(36, { message: "Match Status no valido" }),
  matchCategory: z
    .string()
    .nonempty("Match Category requerido")
    .length(36, { message: "Match Category no valido" }),
  pair1Id: z.string().nonempty("Pareja 1 requerido"),
  pair2Id: z.string().nonempty("Pareja 2 requerido"),
});
type PairsData = z.infer<typeof matchesSchema>;

export default function MatchesForm({
  pairsList,
  categoriesList,
  matchCategoriesList,
  mastStatusList,
}: {
  pairsList: [];
  categoriesList: Category[];
  matchCategoriesList: Category[];
  mastStatusList: Category[];
}) {
  // fetch the categories and the players
  const form = useForm<PairsData>({
    resolver: zodResolver(matchesSchema),
    defaultValues: {},
  });

  const onSubmit = async (pairData: PairsData) => {
    console.log({ pairData });
    try {
      const result = matchesSchema.safeParse(pairData);
      if (!result.success) throw new Error("Invalid Data");
      // fetch to craete a new group
      const { matchCategory, matchStatus, categoryId, pair1Id, pair2Id } =
        result.data;
      console.log({ pair1Id, pair2Id, categoryId });
      toast.promise(
        createMatch({
          registration_category_id: categoryId,
          match_category_id: matchCategory,
          match_status_id: matchStatus,
          pairs: [pair1Id, pair2Id],
        }),
        {
          loading: "Creando partido...",
          success: () => "Partido creado con éxito!",
          error: (error) => {
            if (error instanceof Error) {
              return error.message.includes("No autorizado")
                ? "Debes iniciar sesión para crear partidos"
                : error.message;
            }
            return "Error desconocido al crear el partido";
          },
        }
      );
    } catch (error) {
      console.error("Unexpected error:", error);
      toast.error("Error inesperado al crear el partido");
    }
    form.reset();
  };

  return (
    <div className="px-6 py-3 sm:p-12 max-w-5xl mx-auto bg-dark/30 rounded-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          {/* Pair 1 */}
          <ComboBox
            labelField="Pareja 1"
            name="pair1Id"
            control={form.control}
            suggestions={pairsList}
          />
          {/* Pair 2 */}
          <ComboBox
            labelField="Pareja 2"
            name="pair2Id"
            control={form.control}
            suggestions={pairsList}
          />
          {/* Categories */}
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
          {/* Match status */}
          <FormField
            control={form.control}
            name="matchStatus"
            render={({ field }) => (
              <Select onValueChange={field.onChange} value={field.value}>
                <FormItem>
                  <FormLabel>Match Status</FormLabel>
                  <FormControl>
                    <SelectTrigger className="w-full">
                      <SelectValue placeholder="Selecciona el match status" />
                    </SelectTrigger>
                  </FormControl>
                  <SelectContent>
                    {mastStatusList.map((matchStatus) => {
                      return (
                        <SelectItem
                          key={`matchStatus-${matchStatus.id}`}
                          value={matchStatus.id}
                        >
                          {matchStatus.description}
                        </SelectItem>
                      );
                    })}
                  </SelectContent>
                  <FormMessage />
                </FormItem>
              </Select>
            )}
          />
          {/* Match category */}
          <FormField
            control={form.control}
            name="matchCategory"
            render={({ field }) => (
              <Select onValueChange={field.onChange} value={field.value}>
                <FormItem>
                  <FormLabel>Match Category</FormLabel>
                  <FormControl>
                    <SelectTrigger className="w-full">
                      <SelectValue placeholder="Selecciona el match status" />
                    </SelectTrigger>
                  </FormControl>
                  <SelectContent>
                    {matchCategoriesList.map((matchCategory) => {
                      return (
                        <SelectItem
                          key={`matchCategory-${matchCategory?.id}`}
                          value={matchCategory?.id}
                        >
                          {matchCategory?.description}
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
          >
            Agregar Partido
          </Button>
        </form>
      </Form>
    </div>
  );
}
