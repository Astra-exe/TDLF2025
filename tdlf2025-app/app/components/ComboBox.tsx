import { useState } from "react";
import {
  Popover,
  PopoverTrigger,
  PopoverContent,
} from "@/app/components/ui/popover";
import { Button } from "@/app/components/ui/button";
import {
  Command,
  CommandEmpty,
  CommandGroup,
  CommandInput,
  CommandItem,
  CommandList,
} from "@/app/components/ui/command";
import {
  FormControl,
  FormItem,
  FormLabel,
  FormMessage,
} from "@/app/components/ui/form";
import { Controller, Control } from "react-hook-form";
import { cn } from "@/app/lib/utils";
import { Check, ChevronsUpDown } from "lucide-react";

type ComboBoxProps = {
  labelField: string;
  name: string;
  control: Control<any>; // Correctly typed control prop
  suggestions: any; // Suggestions passed as an array
};

export default function ComboBox({
  labelField,
  name,
  control,
  suggestions = [],
}: ComboBoxProps) {
  const [open, setOpen] = useState(false);

  return (
    <Controller
      name={name}
      control={control}
      render={({ field }) => (
        <FormItem className="flex flex-col">
          <FormLabel>{labelField}</FormLabel>
          <Popover open={open} onOpenChange={setOpen}>
            <PopoverTrigger asChild>
              <FormControl>
                <Button
                  variant="outline"
                  role="combobox"
                  aria-expanded={open}
                  className={cn(
                    "w-full justify-between",
                    !field.value && "text-muted-foreground"
                  )}
                >
                  {field.value
                    ? suggestions.find(
                        (suggestion) => suggestion.value === field.value
                      )?.label
                    : "Selecciona uno"}
                  <ChevronsUpDown className="opacity-50" />
                </Button>
              </FormControl>
            </PopoverTrigger>
            <PopoverContent className="p-0">
              <Command>
                <CommandInput placeholder="Buscar..." className="h-9" />
                <CommandList>
                  <CommandEmpty>Sin sugerencias.</CommandEmpty>
                  <CommandGroup>
                    {suggestions.map((suggestion) => (
                      <CommandItem
                        value={suggestion.label}
                        key={suggestion.value}
                        onSelect={() => {
                          field.onChange(suggestion.value);
                          setOpen(false);
                        }}
                      >
                        {suggestion.label}
                        <Check
                          className={cn(
                            "ml-auto",
                            suggestion.value === field.value
                              ? "opacity-100"
                              : "opacity-0"
                          )}
                        />
                      </CommandItem>
                    ))}
                  </CommandGroup>
                </CommandList>
              </Command>
            </PopoverContent>
          </Popover>
          <FormMessage />
        </FormItem>
      )}
    />
  );
}
