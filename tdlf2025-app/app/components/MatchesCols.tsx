"use client";
import { ColumnDef } from "@tanstack/react-table";
import {
  DeleteMatch,
  UpdateMatch,
} from "@/app/components/dashboard/matches/buttons";

export type MatchesRow = {
  id: string;
  idCategory: string;
  group: string;
  pair1: {
    id: string;
    players: string[];
    isWinner: number;
  };
  pair2: {
    id: string;
    players: string[];
    isWinner: number;
  };
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
      const [player1, player2] = match.pair1.players;
      return (
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">{player1}</p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">{player2}</p>
        </div>
      );
    },
  },
  {
    accessorKey: "pair2",
    header: "Pareja 2",
    cell: ({ row }) => {
      const match = row.original;
      const [player1, player2] = match.pair2.players;
      return (
        <div className="flex items-center">
          <p className="relative text-sm lg:text-base">{player1}</p>
          <span className="mx-1">/</span>
          <p className="relative text-sm lg:text-base">{player2}</p>
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
    accessorKey: "pointsPair2",
    header: "Puntos Pareja 2",
    cell: ({ row }) => <span>{row.getValue("pointsPair2")}</span>,
  },
  {
    id: "actions",
    header: "Acciones",
    cell: ({ row }) => {
      const match = row.original;
      return (
        <div className="flex space-x-2">
          <UpdateMatch
            id={match.id}
            idPair={match.pair1.id}
            score={match.pointsPair1}
            isWinner={Boolean(match.pair1.isWinner)}
            idCategory={match.idCategory}
          />
          <UpdateMatch
            id={match.id}
            idPair={match.pair2.id}
            score={match.pointsPair2}
            isWinner={Boolean(match.pair2.isWinner)}
            idCategory={match.idCategory}
          />
          <DeleteMatch id={match.id} idCategory={match.idCategory} />
        </div>
      );
    },
  },
];
