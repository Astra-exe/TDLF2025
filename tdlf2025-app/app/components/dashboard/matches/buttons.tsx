import { Edit, Trash } from "lucide-react";
import { Button } from "@/app/components/ui/button";
import { deleteMatchById } from "@/app/lib/actions";
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
import {
  Dialog,
  DialogContent,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from "../../ui/dialog";
import MatchEditForm from "../../MatchEditForm";

export function UpdateMatch({
  id,
  idPair,
  score,
  isWinner,
  idCategory,
}: {
  id: string;
  idPair: string;
  score: number;
  isWinner: boolean;
  idCategory: string;
}) {
  return (
    <Dialog>
      <DialogTrigger asChild>
        <Button variant="outline">
          <Edit />
        </Button>
      </DialogTrigger>
      <DialogContent className="sm:max-w-[425px]">
        <DialogHeader>
          <DialogTitle>Editar Score Pareja 1</DialogTitle>
          {/* <DialogDescription>
            Make changes to your profile here. Click save when you're done.
          </DialogDescription> */}
        </DialogHeader>
        <div className="mt-6">
          <MatchEditForm
            idMatch={id}
            idPair={idPair}
            idCategory={idCategory}
            score={score}
            isWinner={isWinner}
          />
        </div>
      </DialogContent>
    </Dialog>
  );
}

export function DeleteMatch({
  id,
  idCategory,
}: {
  id: string;
  idCategory: string;
}) {
  const deleteMatchWithId = deleteMatchById.bind(null, { id, idCategory });

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
            Esta acción no se puede deshacer. Eliminará el partido y sus datos
          </AlertDialogDescription>
        </AlertDialogHeader>
        <AlertDialogFooter>
          <AlertDialogCancel>Cancelar</AlertDialogCancel>
          <form
            action={deleteMatchWithId}
            onSubmit={(e) => {
              e.preventDefault();
              startTransition(async () => {
                try {
                  await deleteMatchWithId();
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
