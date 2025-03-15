"use client";

import { zodResolver } from "@hookform/resolvers/zod";
import { useForm } from "react-hook-form";
import { z } from "zod";
import { useActionState } from "react";
import { authenticate } from "@/app/lib/actions";
import { useSearchParams } from "next/navigation";

import { Button } from "@/app/components/ui/button";
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/app/components/ui/form";
import { Input } from "@/app/components/ui/input";

const formLoginSchema = z.object({
  username: z
    .string({
      required_error: "Por favor ingresa tu username",
    })
    .min(2, {
      message: "El username debe de tener por lo menos 1 caracter",
    })
    .max(128, {
      message: "El username debe de tener solo hasta 128 caracteres",
    }),
  password: z
    .string({
      required_error: "Por favor ingresa tu password",
    })
    .min(8, {
      message: "El password debe de tener por lo menos 8 caracteres",
    })
    .max(64, {
      message: "El password solo debe de tener hasta 64 caracteres",
    }),
});

export default function LoginForm() {
  const searchParams = useSearchParams();
  const callbackUrl = searchParams.get("callbackUrl") || "/dashboard";
  const [errorMessage, formAction, isPending] = useActionState(
    authenticate,
    undefined
  );

  // Define your form.
  const form = useForm<z.infer<typeof formLoginSchema>>({
    resolver: zodResolver(formLoginSchema),
    defaultValues: {
      username: "",
      password: "",
    },
  });

  async function onSubmit(values: z.infer<typeof formLoginSchema>) {
    console.log(values);
    formAction(values);
  }

  return (
    <div className="bg-white rounded-2xl text-dark px-8 py-3 sm:p-14 border-2 border-dark/50 shadow-2xl backdrop-blur-2xl">
      <Form {...form}>
        <form onSubmit={form.handleSubmit(onSubmit)} className="space-y-8">
          <FormField
            control={form.control}
            name="username"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Username</FormLabel>
                <FormControl>
                  <Input placeholder="username" {...field} />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <FormField
            control={form.control}
            name="password"
            render={({ field }) => (
              <FormItem>
                <FormLabel>Password</FormLabel>
                <FormControl>
                  <Input type="password" placeholder="password" {...field} />
                </FormControl>
                <FormMessage />
              </FormItem>
            )}
          />
          <input type="hidden" name="redirectTo" value={callbackUrl} />
          <Button
            className="cursor-pointer block ml-auto text-white"
            type="submit"
            aria-disabled={isPending}
          >
            Log in
          </Button>
          <div
            className="flex items-end space-x-1"
            aria-live="polite"
            aria-atomic="true"
          >
            {errorMessage && (
              <>
                <p className="text-sm text-red-500">{errorMessage}</p>
              </>
            )}
          </div>
        </form>
      </Form>
    </div>
  );
}
