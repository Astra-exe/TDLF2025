"use client";
import { ColumnDef } from "@tanstack/react-table";
import Link from "next/link";
import {
  DeletePlayer,
  UpdatePlayer,
} from "@/app/components/dashboard/players/buttons";

export type PlayerRow = {
  id: string;
  fullname: string;
  city: string;
  weight: string;
  height: string;
};

export const columns: ColumnDef<PlayerRow>[] = [
  {
    accessorKey: "fullname",
    header: "Nombre",
    cell: ({ row }) => (
      <Link
        href={`/jugador/${row.original.id}`}
        className="hover:underline transition-all"
      >
        {row.original.fullname}
      </Link>
    ),
  },
  {
    accessorKey: "city",
    header: "Ciudad",
    cell: ({ row }) => <span>{row.getValue("city")}</span>,
  },
  {
    accessorKey: "weight",
    header: "Peso",
    cell: ({ row }) => <span>{row.getValue("weight")}</span>,
  },
  {
    accessorKey: "height",
    header: "Altura",
    cell: ({ row }) => <span>{row.getValue("height")}</span>,
  },
  {
    id: "actions",
    header: "Acciones",
    cell: ({ row }) => {
      const player = row.original;
      return (
        <div className="flex space-x-2">
          <UpdatePlayer id={player.id} />
          <DeletePlayer id={player.id} />
        </div>
      );
    },
  },
];
