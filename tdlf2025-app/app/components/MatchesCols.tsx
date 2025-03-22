"use client";
import { ColumnDef } from "@tanstack/react-table";
import Link from "next/link";
import { Button } from "./ui/button";
import { Trash } from "lucide-react";

export type MatchesRow = {
  id: string;
  group: string;
  pair1: {
    id: string;
    fullname: string;
  }[];
  pair2: {
    id: string;
    fullname: string;
  }[];
  pointsPair1: number;
  pointsPair2: number;
};

export const columns: ColumnDef<MatchesRow>[] = [
  {
    accessorKey: "group",
    header: "Grupo",
    cell: ({ row }) => <span>{row.getValue("group")}</span>,
  },
  {
    accessorKey: "pair1",
    header: "Pareja 1",
    cell: ({ row }) => {
      const match = row.original;
      const [player1, player2] = match.pair1;
      return (
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player1.id}`}
              className="hover:underline transition-all"
            >
              {player1.fullname}
            </Link>
          </p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player2.id}`}
              className="hover:underline transition-all"
            >
              {player2.fullname}
            </Link>
          </p>
        </div>
      );
    },
  },
  {
    accessorKey: "pair2",
    header: "Pareja 2",
    cell: ({ row }) => {
      const match = row.original;
      const [player1, player2] = match.pair2;
      return (
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player1.id}`}
              className="hover:underline transition-all"
            >
              {player1.fullname}
            </Link>
          </p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">
            <Link
              href={`/jugador/${player2.id}`}
              className="hover:underline transition-all"
            >
              {player2.fullname}
            </Link>
          </p>
        </div>
      );
    },
  },
  {
    accessorKey: "pointsPair1",
    header: "Puntos Pareja 1",
    cell: ({ row }) => <span>{row.getValue("pointsPair1")}</span>,
  },
  {
    accessorKey: "pointsPair1",
    header: "Puntos Pareja 2",
    cell: ({ row }) => <span>{row.getValue("pointsPair1")}</span>,
  },
  {
    id: "actions",
    header: "Acciones",
    cell: ({ row }) => {
      const match = row.original;
      return (
        <div className="flex space-x-2">
          <Button>
            <Trash></Trash>
          </Button>
        </div>
      );
    },
  },
];
