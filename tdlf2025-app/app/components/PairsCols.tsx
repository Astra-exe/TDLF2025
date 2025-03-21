"use client";
import { ColumnDef } from "@tanstack/react-table";
import Link from "next/link";
import {
  UpdatePair,
  DeletePair,
} from "@/app/components/dashboard/pairs/buttons";

export type PairRow = {
  id: string;
  player1: {
    id: string;
    name: string;
  };
  player2: {
    id: string;
    name: string;
  };
  category: "Libre" | "Seniors";
};

export const columnsPublic: ColumnDef<PairRow>[] = [
  {
    accessorKey: "player1",
    header: "Jugador 1",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.player1.id}`}
        className="hover:underline transition-all"
      >
        {row.original.player1.name}
      </Link>
    ),
  },
  {
    accessorKey: "player2",
    header: "Jugador 2",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.player2.id}`}
        className="hover:underline transition-all"
      >
        {row.original.player2.name}
      </Link>
    ),
  },
  {
    accessorKey: "category",
    header: "Categoria",
    cell: ({ row }) => <span>{row.getValue("category")}</span>,
  },
];

export const columns: ColumnDef<PairRow>[] = [
  {
    accessorKey: "player1",
    header: "Jugador 1",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.player1.id}`}
        className="hover:underline transition-all"
      >
        {row.original.player1.name}
      </Link>
    ),
  },
  {
    accessorKey: "player2",
    header: "Jugador 2",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.player2.id}`}
        className="hover:underline transition-all"
      >
        {row.original.player2.name}
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
          <UpdatePair id={pair.id} />
          <DeletePair id={pair.id} />
        </div>
      );
    },
  },
];
