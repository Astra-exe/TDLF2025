"use client";

import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { Button } from "@/app/components/ui/button";
import { Input } from "@/app/components/ui/input";
import { createPlayer } from "@/app/lib/actions";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
  FormDescription,
} from "@/app/components/ui/form";
import { toast } from "sonner";

const inscripcionSchema = z.object({
  fullname: z
    .string()
    .nonempty("Nombre completo es requerido")
    .min(5, { message: "El nombre debe contener al menos 5 caracteres" })
    .max(128)
    .trim(),
  city: z
    .string()
    .nonempty("Ciudad es requerido")
    .min(1, { message: "La ciudad debe contener al menos 3 caracteres" })
    .max(128)
    .trim(),
  weight: z.coerce
    .number({
      required_error: "Peso es requerido",
    })
    .positive({ message: "El peso debe ser mayor que 0" })
    .gte(20, { message: "Debe de ser a partir de 20 o más kg" }),
  height: z.coerce
    .number({
      required_error: "Altura es requerido",
    })
    .positive({ message: "La altura debe ser mayor que 0" })
    .gte(0.5, { message: "Debe de ser a partir de 0.5 mts" })
    .lte(2.5, { message: "Debe de ser menor de 2.5 mts" }),
  age: z.coerce
    .number({
      required_error: "Edad es requerido",
    })
    .int()
    .positive({ message: "La edad debe ser mayor que 0" })
    .gte(14, { message: "Debe de ser a partir de los 14 años" }),
  experience: z.coerce
    .number({
      required_error: "Experiencia es requerida",
    })
    .positive({ message: "La experiencia debe ser mayor que 0" }),
});

type InscriptionData = z.infer<typeof inscripcionSchema>;

export default function InscriptionForm() {
  const form = useForm<InscriptionData>({
    resolver: zodResolver(inscripcionSchema),
    defaultValues: {
      fullname: "Rafael Nadal",
      city: "Irapuato",
      weight: 67.4,
      height: 1.73,
      age: 32,
      experience: 4,
    },
  });

  const onSubmit = async (data: InscriptionData) => {
    console.log(data);
    try {
      const result = inscripcionSchema.safeParse(data);
      if (!result.success) throw new Error("Invalid Data");
      // fetch to craete a new group
      const { fullname, city, weight, height, age, experience } = result.data;
      await createPlayer({
        fullname,
        city,
        weight,
        height,
        age,
        experience,
      });
      toast.success("Jugador inscrito con exito");
    } catch (error) {
      console.log(error);
      toast.error(error.message ?? "Ocurrio un error");
    }
    // toast depends if there is an error
    form.reset();
  };

  return (
    <div className="px-6 py-3 sm:p-12 max-w-5xl mx-auto bg-dark/30 rounded-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-6">
          <FormField
            control={form.control}
            name="fullname"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Nombre completo</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    placeholder="Rafael Nadal"
                    {...field}
                  />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="city"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Ciudad</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    type="text"
                    placeholder="Irapuato"
                    {...field}
                  />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="weight"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Peso</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    type="number"
                    placeholder="72"
                    {...field}
                  />
                </FormControl>
                <FormDescription>El peso del jugador en kg</FormDescription>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="height"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Altura</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    type="number"
                    placeholder="1.70"
                    {...field}
                  />
                </FormControl>
                <FormDescription>La altura del jugador en mts</FormDescription>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="age"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Edad</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    type="number"
                    placeholder="30"
                    {...field}
                  />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="experience"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Años de experiencia</FormLabel>
                <FormControl>
                  <Input
                    className="ring-1 ring-white/20"
                    type="number"
                    placeholder="3"
                    {...field}
                  />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <Button
            className="cursor-pointer block ml-auto text-white"
            type="submit"
            size={"lg"}
            // aria-disabled={isPending}
          >
            Inscribir jugador
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
