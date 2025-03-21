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
