export type User = {
  id: string;
  username: string;
  apiKey: string;
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
};
