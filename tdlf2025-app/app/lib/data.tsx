const URL_API = `${process.env.NEXT_PUBLIC_API_URL}/v1`;

type FetchPlayersProps = {
  apiKey: string;
  page: number;
  search?: string;
  filterBy?: string;
  orderBy?: string;
  sortBy?: string;
};

export async function fetchPlayers({
  apiKey,
  page = 1,
  search = "",
  filterBy = "",
  orderBy = "",
  sortBy = "",
}: FetchPlayersProps) {
  const url = `${URL_API}/players?page=${page}`;
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

export async function fetchPairs(apiKey: string) {
  const url = `${URL_API}/pairs/players`;
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
  const playersPromise = fetchPlayers({ apiKey, page: 1 });
  const pairsPromise = fetchPairs(apiKey);
  // const playersOpenPromise = fetchPlayers({apiKey, page: 1, search: 'open',filterBy: 'category',})
  // const playersSeniorPromise = fetchPlayers({apiKey, page: 1, search: 'senior',filterBy: 'category',})

  const data = await Promise.all([
    playersPromise,
    pairsPromise,
    // playersOpenPromise,
    // playersSeniorPromise
  ]);

  const numberOfPlayers = data[0].pagination.count;
  const numberOfPairs = data[0].pagination.count;

  return {
    numberOfPlayers,
    numberOfPairs,
    // numberOfPlayersOpen
    // numberOfPlayersSenior
    // numberOfGroups
    // numberOfMatches
    // numberOfGroupsOpen
    // numberOfGroupsSenior
    // numberOfMatchesOpen
    // numberOfMatchesSenior
  };
}

export async function fetchFilterPlayers() {}

export async function fetchGroups() {}

export async function fetchMatches() {}
