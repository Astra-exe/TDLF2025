import { PairsPlayers } from "@/app/lib/definitions";
import { PairRow } from "@/app/components/PairsCols";
import { auth } from "@/auth";

const URL_API = `${process.env.NEXT_PUBLIC_API_URL}/v1`;

type FetchPlayersProps = {
  apiKey: string;
  page: number;
  search?: string;
  filterBy?: string;
  orderBy?: string;
  sortBy?: string;
};
type FetchPairsProps = {
  apiKey: string;
  page: number;
  registration_category_id?: string;
  orderBy?: string;
  sortBy?: string;
  is_eliminated?: boolean | null;
};

export async function fetchPlayers({
  apiKey,
  page = 1,
  search = "",
  filterBy = "",
  orderBy = "",
  sortBy = "",
}: FetchPlayersProps) {
  const url = `${URL_API}/players?page=${page}&search=${search}&filterBy=${filterBy}&orderBy=${orderBy}&sortBy=${sortBy}&is_active=true`;
  const response = await fetch(url, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      "X-API-KEY": apiKey,
    },
  });
  console.log({ response });
  if (!response.ok) {
    const errorData = await response.json();
    console.log(errorData);
    throw new Error(errorData?.description || "Error al obtener los jugadores");
  }
  const data = await response.json();
  return data;
}

export async function fetchPairs({
  apiKey,
  page = 1,
  orderBy = "",
  sortBy = "",
  registration_category_id = "",
  is_eliminated = null,
}: FetchPairsProps) {
  const url = `${URL_API}/pairs/players?page=${page}&orderBy=${orderBy}&sortBy=${sortBy}&registration_category_id=${registration_category_id}&is_eliminated=${is_eliminated}&is_active=true`;
  const response = await fetch(url, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      "X-API-KEY": apiKey,
    },
  });
  // console.log({ response });
  if (!response.ok) {
    const errorData = await response.json();
    console.log(errorData);
    throw new Error(errorData?.description || "Error al obtener las parejas");
  }
  const data = await response.json();
  return data;
}

export async function fetchPairById({
  idPair,
  apiKey,
}: {
  idPair: string;
  apiKey: string;
}) {
  try {
    const url = `${URL_API}/pairs/${idPair}`;
    const response = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": apiKey,
      },
    });
    if (!response.ok) {
      const errorData = await response.json();
      console.log(errorData);
      throw new Error(errorData?.description || "Error al obtener la pareja");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchCategories(apiKey: string) {
  const url = `${URL_API}/categories/registrations`;
  const response = await fetch(url, {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
      "X-API-KEY": apiKey,
    },
  });
  // console.log({ response });
  if (!response.ok) {
    const errorData = await response.json();
    console.log(errorData);
    throw new Error(
      errorData?.description || "Error al obtener las categorias"
    );
  }
  const data = await response.json();
  return data;
}

export async function fetchAllPlayers(apiKey: string) {
  const allPlayers = [];

  // Fetch the first page to get the total pages
  const { data: dataPlayersPage1, pagination } = await fetchPlayers({
    page: 1,
    apiKey: apiKey,
  });
  const totalPages = pagination.total;
  allPlayers.push(...dataPlayersPage1);

  // Loop through each page
  for (let i = 2; i <= totalPages; i++) {
    const { data: dataRestPlayersPages } = await fetchPlayers({
      page: i,
      apiKey,
    });
    allPlayers.push(...dataRestPlayersPages);
  }

  return allPlayers;
}

export async function fetchPlayerById({
  idPlayer,
  apiKey,
}: {
  idPlayer: string;
  apiKey: string;
}) {
  try {
    const url = `${URL_API}/players/${idPlayer}`;
    const response = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": apiKey,
      },
    });
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchCardsData(apiKey: string) {
  const { data: categoriesData } = await fetchCategories(apiKey);
  const [category1, category2] = categoriesData;
  const playersPromise = fetchPlayers({ apiKey, page: 1 });
  const pairsPromise = fetchPairs({ apiKey, page: 1 });
  const pairsSeniorPromise = fetchPairs({
    apiKey,
    page: 1,
    registration_category_id: category1.id,
  });
  const pairsOpenPromise = fetchPairs({
    apiKey,
    page: 1,
    registration_category_id: category2.id,
  });

  const data = await Promise.all([
    playersPromise,
    pairsPromise,
    pairsOpenPromise,
    pairsSeniorPromise,
  ]);
  const numberOfPlayers = data[0].pagination.count;
  const numberOfPairs = data[1].pagination.count;
  const numberOfPairsOpen = data[2].pagination.count;
  const numberOfPairsSenior = data[3].pagination.count;

  return {
    numberOfPlayers,
    numberOfPairs,
    numberOfPairsOpen,
    numberOfPairsSenior,
    // numberOfGroups
    // numberOfMatches
    // numberOfGroupsOpen
    // numberOfGroupsSenior
    // numberOfMatchesOpen
    // numberOfMatchesSenior
  };
}

export async function fetchAllPairs(apiKey: string) {
  const allPairs = [];

  // Fetch the first page to get the total pages
  const { data: dataPairsPage1, pagination } = await fetchPairs({
    page: 1,
    apiKey: apiKey,
  });
  const totalPages = pagination.total;
  allPairs.push(...dataPairsPage1);

  // Loop through each page
  for (let i = 2; i <= totalPages; i++) {
    const { data: dataRestPairsPages } = await fetchPairs({
      page: i,
      apiKey,
    });
    allPairs.push(...dataRestPairsPages);
  }

  return allPairs;
}

export async function login(username: string, password: string) {
  const url = `${URL_API}/auth/login`;
  try {
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify({
        nickname: username,
        password: password,
      }),
      headers: {
        "Content-Type": "application/json",
      },
    });
    // console.log({response})
    const { data } = await response.json();

    if (response.ok && data.api_key) {
      return {
        apiKey: data.api_key,
      };
    }
  } catch (error) {
    console.error("Failed to fetch user:", error);
    throw new Error("Failed to fetch user.");
  }
}

export async function fetchProfile({
  apiKey,
  idPlayer,
}: {
  apiKey: string;
  idPlayer: string;
}) {
  const url = `${URL_API}/analysis/profiles/${idPlayer}`;
  try {
    const response = await fetch(url, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "X-API-KEY": apiKey,
      },
    });
    if (!response.ok) {
      const errorData = await response.json();
      console.log(errorData);
      throw new Error(
        errorData?.description || "Error al obtener el perfil del jugador"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchTablePairData(apiKey: string) {
  const dataPairs = await fetchAllPairs(apiKey);
  const tableDataPromises = dataPairs.map(async (pairData: PairsPlayers[]) => {
    const [player1Info, player2Info] = pairData;
    const idPair = player1Info.relationship.pair_id;
    const pairInfo = await fetchPairById({ idPair, apiKey });

    return {
      id: idPair,
      player1: {
        id: player1Info?.player?.id,
        name: player1Info?.player?.fullname ?? "No reconocido",
      },
      player2: {
        id: player2Info?.player?.id,
        name: player2Info?.player?.fullname ?? "No reconocido",
      },
      category:
        pairInfo?.data?.registration_category?.description ?? "Sin categoria",
    };
  });
  const tableData: PairRow[] = await Promise.all(tableDataPromises);
  return tableData;
}

export async function fetchTablePlayerData(apiKey: string) {
  const dataPlayers = await fetchAllPlayers(apiKey);
  const tableData = dataPlayers.map((playerData) => {
    const { id, fullname, city, weight, height } = playerData;
    return {
      id,
      fullname,
      city,
      weight,
      height,
    };
  });
  return tableData;
}

export async function getApiKey() {
  const session = await auth();
  let apiKey: string;
  // If already authenticated (admin or public user)
  if (session?.user?.apiKey) {
    apiKey = session.user.apiKey;
  } else {
    // Programmatic sign-in with admin credentials
    const data = await login(
      process.env.API_USERNAME ?? "",
      process.env.API_PASSWORD ?? ""
    );
    if (!data?.apiKey) {
      throw new Error("No Autorizado");
    }
    apiKey = data.apiKey;
  }
  return apiKey;
}

export async function fetchFilterPlayers() {}

export async function fetchGroups() {}

export async function fetchMatches() {}
