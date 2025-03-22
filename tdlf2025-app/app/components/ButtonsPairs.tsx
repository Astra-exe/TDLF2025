import { PlusIcon } from "lucide-react";
import Link from "next/link";

export function ButtonCreatePair() {
  return (
    <Link
      href="/dashboard/parejas/crear"
      className="px-4 py-3 flex items-center rounded-lg text-sm font-medium transition-colors hover:bg-dark/40 border border-gray-800"
    >
      <span className="hidden md:block">Agregar Pareja</span>{" "}
      <PlusIcon className="h-5 md:ml-4" />
    </Link>
  );
}

// export function UpdateInvoice({ id }: { id: string }) {
//   return (
//     <Link
//       href={`/dashboard/invoices/${id}/edit`}
//       className="rounded-md border p- hover:bg-gray-00"
//     >
//       <PencilIcon className="w-5" />
//     </Link>
//   );
// }

// export function DeleteInvoice({ id }: { id: string }) {
//   const deleteInvoiceWithId = deleteInvoice.bind(null, id);

//   return (
//     <form action={deleteInvoiceWithId}>
//       <button type="submit" className="rounded-md border p- hover:bg-gray-00">
//         <span className="sr-only">Delete</span>
//         <TrashIcon className="w-5" />
//       </button>
//     </form>
//   );
// }
