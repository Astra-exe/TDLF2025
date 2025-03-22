import Link from "next/link";
import { Edit, Trash } from "lucide-react";
import { Button } from "@/app/components/ui/button";
import { deletePlayerById } from "@/app/lib/actions";
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

export function UpdatePlayer({ id }: { id: string }) {
  return (
    <Link
      href={`/dashboard/jugadores/${id}/editar`}
      className="rounded-md border p-2 hover:bg-dark/50"
    >
      <Edit className="w-4 h-4" />
    </Link>
  );
}

export function DeletePlayer({ id }: { id: string }) {
  const deletePlayerWithId = deletePlayerById.bind(null, id);

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
            Esta acción no se puede deshacer. Eliminará al jugador y sus datos
          </AlertDialogDescription>
        </AlertDialogHeader>
        <AlertDialogFooter>
          <AlertDialogCancel>Cancelar</AlertDialogCancel>
          <form
            action={deletePlayerWithId}
            onSubmit={(e) => {
              e.preventDefault();
              startTransition(async () => {
                try {
                  await deletePlayerWithId();
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
