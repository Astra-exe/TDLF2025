"use client";
import { ColumnDef } from "@tanstack/react-table";
import { Button } from "@/app/components/ui/button";
import { Edit, Trash } from "lucide-react";
import Link from "next/link";

export type PairRow = {
  id: string;
  player1: string;
  player2: string;
  category: "Libre" | "Seniors";
};

export const columns: ColumnDef<PairRow>[] = [
  {
    accessorKey: "player1",
    header: "Jugador 1",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.id}`}
        className="hover:underline transition-all"
      >
        {row.getValue("player1")}
      </Link>
    ),
  },
  {
    accessorKey: "player2",
    header: "Jugador 2",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.id}`}
        className="hover:underline transition-all"
      >
        {row.getValue("player2")}
      </Link>
    ),
  },
  {
    accessorKey: "category",
    header: "Categoria",
    cell: ({ row }) => <span>{row.getValue("category")}</span>,
  },
  {
    id: "actions",
    header: "Acciones",
    cell: ({ row }) => {
      const pair = row.original;
      return (
        <div className="flex space-x-2">
          <Button variant="outline" size="sm" onClick={() => handleEdit(pair)}>
            <Edit className="w-4 h-4" />
          </Button>
          <Button
            variant="outline"
            size="sm"
            onClick={() => handleDelete(pair)}
          >
            <Trash className="w-4 h-4" />
          </Button>
        </div>
      );
    },
  },
];

const handleEdit = (data: PairRow) => {
  alert(`Editing ${data.player1} & ${data.player2}`);
};

const handleDelete = (data: PairRow) => {
  alert(`Deleting ${data.player1} & ${data.player2}`);
};
