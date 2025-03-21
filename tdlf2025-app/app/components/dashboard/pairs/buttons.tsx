import Link from "next/link";
import { Edit, Trash } from "lucide-react";
import { Button } from "@/app/components/ui/button";
import { deletePairById } from "@/app/lib/actions";
import {
  AlertDialog,
  AlertDialogAction,
  AlertDialogCancel,
  AlertDialogContent,
  AlertDialogDescription,
  AlertDialogFooter,
  AlertDialogHeader,
  AlertDialogTitle,
  AlertDialogTrigger,
} from "@/app/components/ui/alert-dialog";
import { startTransition } from "react";
import { toast } from "sonner";

export function UpdatePair({ id }: { id: string }) {
  return (
    <Link
      href={`/dashboard/parejas/${id}/editar`}
      className="rounded-md border p-2 hover:bg-dark/50"
    >
      <Edit className="w-4 h-4" />
    </Link>
  );
}

export function DeletePair({ id }: { id: string }) {
  const deletePairWithId = deletePairById.bind(null, id);

  return (
    <AlertDialog>
      <AlertDialogTrigger asChild>
        <Button
          type="submit"
          variant="outline"
          size="sm"
          className="cursor-pointer"
        >
          <Trash className="w-4 h-4 " />
        </Button>
      </AlertDialogTrigger>
      <AlertDialogContent>
        <AlertDialogHeader>
          <AlertDialogTitle>¿Estas seguro?</AlertDialogTitle>
          <AlertDialogDescription>
            Esta acción no se puede deshacer. Eliminará a la pareja y sus datos
          </AlertDialogDescription>
        </AlertDialogHeader>
        <AlertDialogFooter>
          <AlertDialogCancel>Cancelar</AlertDialogCancel>
          <form
            action={deletePairWithId}
            onSubmit={(e) => {
              e.preventDefault();
              startTransition(async () => {
                try {
                  await deletePairWithId();
                  toast.success("Eliminado con éxito");
                } catch (error) {
                  console.log(error);
                  toast.error("Error al eliminar");
                }
              });
            }}
          >
            <AlertDialogAction type="submit">Eliminar</AlertDialogAction>
          </form>
        </AlertDialogFooter>
      </AlertDialogContent>
    </AlertDialog>
  );
}
