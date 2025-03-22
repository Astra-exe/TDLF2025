export type UserSession = {
  id: string;
  username: string;
  password: string;
  apiKey: string;
  role: string;
  expiresAt: number;
};

export type Player = {
  id: string;
  fullname: string;
  city: string;
  weight: number;
  height: number;
  age: number;
  experience: number;
  is_active: number;
  created_at: string;
  updated_at: string;
};

export type PlayerRelationship = {
  id: string;
  player_id: string;
  pair_id: string;
  created_at: string;
  updated_at: string;
};

export type Pair = {
  id: string;
  players: [string, string];
  is_eliminated: number;
  registration_category_id: string;
};

export type Category = {
  id: string;
  name: string;
  description: string;
  created_at: string;
  updated_at: string;
};

export type PairsPlayers = {
  player: Player;
  relationship: PlayerRelationship;
};

export type PairByGroup = {
  id: string;
  is_eliminated: number;
  is_active: number;
  created_at: string;
  updated_at: string;
  registration_category: Omit<Category, "created_at" | "updated_at">;
  players: PairsPlayers[];
};

export type PairPlayersRelationByGroup = {
  pair: PairByGroup;
};

export type Group = {
  id: string;
  registration_category_id: string;
  name: string;
  description: string;
  is_eliminated: number;
  is_active: number;
  created_at: string;
  updated_at: string;
};

export type MatchStatus = {
  id: string;
  name: string;
  description: string;
};

export type Match = {
  id: string;
  is_active: number;
  created_at: string;
  updated_at: string;
  registration_category: Omit<Category, "created_at" | "updated_at">;
  match_category: MatchStatus;
  match_status: MatchStatus;
};

export type PairPlayersMatchesRelationByGroup = {
  pair: PairByGroup;
  relationship: {
    id: string;
    pair_id: string;
    match_id: string;
    score: number;
    is_winner: number;
    created_at: string;
    updated_at: string;
  };
};

export type MatchesByGroup = Match & {
  pairs: PairPlayersMatchesRelationByGroup[];
};

export type MatchPairPlayers = {
  match: MatchesByGroup;
};

export type GroupByCategory = {
  categoryData: Omit<Category, "created_at" | "updated_at">;
  groupsData: {
    id: string;
    name: string;
    description: string;
    pairs: {
      pair: {
        id: string;
      };
      players: {
        id: string;
        fullname: string;
      }[];
    }[];
  }[];
};

// export type MatchByCategory = {
//   categoryData: Omit<Category, "created_at" | "updated_at">;
//   groupData: Omit<
//     Group,
//     "is_active" | "is_eliminated" | "created_at" | "updated_at"
//   >;
// };

export type MatchByGroup = {
  categoryData: Omit<Category, "created_at" | "updated_at">;
  groupData: {
    id: string;
    name: string;
    description: string;
  };
  matchesData: {
    id: string;
    isActive: number;
    matchCategory: MatchStatus;
    matchStatus: MatchStatus;
    matchPairs: {
      id: string;
      score: number;
      isWinner: number;
      players: {
        id: string;
        fullname: string;
      }[];
    }[];
  }[];
};
