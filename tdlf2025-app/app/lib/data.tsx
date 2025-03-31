import {
  Group,
  PairsPlayers,
  PairPlayersRelationByGroup,
  MatchesByGroup,
} from "@/app/lib/definitions";
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

// -------------- Players -------------------
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
  const url = `${URL_API}/players/${idPlayer}`;
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
      throw new Error(errorData?.description || "Error al obtener el jugador");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

// -------------- Pairs -------------------
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

export async function fetchPairById({
  idPair,
  apiKey,
}: {
  idPair: string;
  apiKey: string;
}) {
  const url = `${URL_API}/pairs/${idPair}`;
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
      throw new Error(errorData?.description || "Error al obtener la pareja");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchPairPlayersById({
  idPair,
  apiKey,
}: {
  idPair: string;
  apiKey: string;
}) {
  const url = `${URL_API}/pairs/${idPair}/players`;
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
        errorData?.description || "Error al obtener los juagdores de la pareja"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

// -------------- Categories -------------------
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

export async function fetchCategoryById({
  idCategory,
  apiKey,
}: {
  idCategory: string;
  apiKey: string;
}) {
  const url = `${URL_API}/categories/registrations/${idCategory}`;
  try {
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

export async function fetchStatusCategories(apiKey: string) {
  const url = `${URL_API}/status/matches`;
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
      errorData?.description || "Error al obtener los estatus de los partidos"
    );
  }
  const data = await response.json();
  return data;
}
export async function fetchMatchesCategories(apiKey: string) {
  const url = `${URL_API}/categories/matches`;
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
      errorData?.description ||
        "Error al obtener las categorias de los partidos"
    );
  }
  const data = await response.json();
  return data;
}

// -------------- Others -------------------
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

export async function fetchStatsCardsData(apiKey: string) {
  const { data: categoriesData } = await fetchCategories(apiKey);
  const [category1, category2] = categoriesData;
  const playersPromise = fetchPlayers({ apiKey, page: 1 });
  const pairsPromise = fetchPairs({ apiKey, page: 1 });
  const matchesPromise = fetchMatches(apiKey);

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
    matchesPromise,
    pairsOpenPromise,
    pairsSeniorPromise,
  ]);
  const numberOfPlayers = data[0].pagination.count;
  const numberOfPairs = data[1].pagination.count;
  const numberOfMatches = data[2].pagination.count;
  const numberOfPairsOpen = data[3].pagination.count;
  const numberOfPairsSenior = data[4].pagination.count;

  return {
    numberOfPlayers,
    numberOfPairs,
    numberOfMatches,
    numberOfPairsOpen,
    numberOfPairsSenior,
  };
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

// -------------- Tables -------------------
export async function fetchTablePairData(apiKey: string) {
  const dataPairs = await fetchAllPairs(apiKey);

  const tableDataPairs = dataPairs.map((item) => {
    const { pair, players } = item;

    const [player1Info, player2Info] = players;

    return {
      id: pair.id,
      player1: {
        id: player1Info?.player?.id,
        name: player1Info?.player?.fullname ?? "No reconocido",
      },
      player2: {
        id: player2Info?.player?.id,
        name: player2Info?.player?.fullname ?? "No reconocido",
      },
      category: pair?.registration_category?.description ?? "Sin categoria",
    };
  });

  return tableDataPairs;
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

// -------------- Groups -------------------
export async function fetchGroups(apiKey: string) {
  const url = `${URL_API}/groups`;
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
      throw new Error(errorData?.description || "Error al obtener grupos");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchGroupById({
  idGroup,
  apiKey,
}: {
  idGroup: string;
  apiKey: string;
}) {
  const url = `${URL_API}/groups/${idGroup}`;
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
      throw new Error(errorData?.description || "Error al obtener el grupo");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchGroupsByCategory({
  idCategory,
  apiKey,
}: {
  idCategory: string;
  apiKey: string;
}) {
  const url = `${URL_API}/categories/registrations/${idCategory}/groups`;
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
        errorData?.description || "Error al obtener grupos por categoria"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchPlayersPairsByGroup({
  idGroup,
  apiKey,
}: {
  idGroup: string;
  apiKey: string;
}) {
  const url = `${URL_API}/groups/${idGroup}/pairs/players`;
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
        errorData?.description ||
          "Error al obtener Parejas y Jugadores por Grupo"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchGroupsPairsPlayersByCategory({
  idCategory,
  apiKey,
}: {
  idCategory: string;
  apiKey: string;
}) {
  // get the category info
  const { data: category } = await fetchCategoryById({ idCategory, apiKey });
  // get the groups info by category
  const { data: groups } = await fetchGroupsByCategory({ idCategory, apiKey });

  const groupsInfoByCategoryPromises = groups.map(async (group: Group) => {
    const idGroup = group.id;
    // get the pairs player by group
    const { data: pairsPlayersInfo } = await fetchPlayersPairsByGroup({
      idGroup,
      apiKey,
    });
    // normalize the data to get the needed data
    const pairsList = pairsPlayersInfo.map(
      (pairPlayers: PairPlayersRelationByGroup) => {
        const playersForPair = pairPlayers.pair.players.map(
          (players: PairsPlayers) => {
            const playerInfo = players.player;
            return {
              id: playerInfo.id,
              fullname: playerInfo.fullname,
            };
          }
        );

        return {
          pair: {
            id: pairPlayers.pair.id,
          },
          players: playersForPair,
        };
      }
    );

    return {
      id: idGroup,
      name: group.name,
      description: group.description,
      pairs: pairsList,
    };
  });

  const groupsInfoByCategory = await Promise.all(groupsInfoByCategoryPromises);
  // return the category info and teh groups by category
  return {
    categoryData: {
      id: category.id,
      name: category.name,
      description: category.description,
    },
    groupsData: groupsInfoByCategory,
  };
}

// -------------- Matches -------------------
export async function fetchMatches(apiKey: string) {
  const url = `${URL_API}/matches`;
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
        errorData?.description || "Error al obtener los partidos"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchMatchPairsById({
  idMatch,
  apiKey,
}: {
  idMatch: string;
  apiKey: string;
}) {
  const url = `${URL_API}/matches/${idMatch}/pairs`;
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
      throw new Error(errorData?.description || "Error al obtener el partido");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchMatchesPlayersPairsByGroup({
  idGroup,
  apiKey,
}: {
  idGroup: string;
  apiKey: string;
}) {
  const url = `${URL_API}/groups/${idGroup}/matches/pairs/players`;
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
        errorData?.description || "Error al obtener partidos por grupo"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchMatchesPairsPlayersByGroup({
  apiKey,
  idGroup,
}: {
  apiKey: string;
  idGroup: string;
}) {
  // get the group info and teh category info by group id
  const { data: group } = await fetchGroupById({ idGroup, apiKey });
  const { registration_category: category } = group;

  const { data: matches } = await fetchMatchesPlayersPairsByGroup({
    idGroup,
    apiKey,
  });

  const matchesInfoByCategoryByGroup = matches.map(
    ({ match }: { match: MatchesByGroup }) => {
      const pairsByMatch = match.pairs.map((pairItem) => {
        const { pair, relationship } = pairItem;

        const playersForPair = pair.players.map((players: PairsPlayers) => {
          const playerInfo = players.player;
          return {
            id: playerInfo.id,
            fullname: playerInfo.fullname,
          };
        });

        return {
          id: pair.id,
          players: playersForPair,
          score: relationship.score,
          isWinner: relationship.is_winner,
        };
      });

      return {
        id: match.id,
        isActive: match.is_active,
        matchCategory: { ...match.match_category },
        matchStatus: { ...match.match_status },
        matchPairs: pairsByMatch,
      };
    }
  );

  return {
    categoryData: {
      id: category.id,
      name: category.name,
      description: category.description,
    },
    groupData: {
      id: group.id,
      name: group.name,
      description: group.description,
    },
    matchesData: matchesInfoByCategoryByGroup,
  };
}

// Table matches
export async function fetchTableMatchesByCategory({
  apiKey,
  idCategory,
}: {
  apiKey: string;
  idCategory: string;
}) {
  const { data: category } = await fetchCategoryById({ idCategory, apiKey });
  // get the groups info by category
  const { data: groups } = await fetchGroupsByCategory({ idCategory, apiKey });

  const matchesInfoByCategoryPromises = groups.map(async (group: Group) => {
    const idGroup = group.id;
    // get the data of matches
    const { data: matches } = await fetchMatchesPlayersPairsByGroup({
      idGroup,
      apiKey,
    });

    const matchesInfoByCategoryByGroup = matches.map(
      ({ match }: { match: MatchesByGroup }) => {
        const pairsByMatch = match.pairs.map((pairItem) => {
          const { pair, relationship } = pairItem;

          const playersForPair = pair.players.map((players: PairsPlayers) => {
            const playerInfo = players.player;
            return {
              id: playerInfo.id,
              fullname: playerInfo.fullname,
            };
          });

          return {
            id: pair.id,
            players: playersForPair,
            score: relationship.score,
            isWinner: relationship.is_winner,
          };
        });

        return {
          id: match.id,
          isActive: match.is_active,
          matchCategory: { ...match.match_category },
          matchStatus: { ...match.match_status },
          matchPairs: pairsByMatch,
        };
      }
    );

    return {
      id: idGroup,
      name: group.name,
      description: group.description,
      matchesInfoByCategoryByGroup,
    };
  });

  const matchesInfoByCategory = await Promise.all(
    matchesInfoByCategoryPromises
  );

  return {
    categoryData: {
      id: category.id,
      name: category.name,
      description: category.description,
    },
    matchesData: matchesInfoByCategory,
  };
}

export async function fetchRankingByGroup({
  apiKey,
  idGroup,
}: {
  apiKey: string;
  idGroup: string;
}) {
  const url = `${URL_API}/groups/${idGroup}/ranking`;
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
        errorData?.description ||
          "Error al obtener Ranking de las parejas y jugadores de un grupo"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

// DATA ANALYSIS
export async function fetchHeatMap(apiKey: string) {
  const url = `${URL_API}/analysis/heatmap`;
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
        errorData?.description || "Error al obtener los partidos"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchParitiesByCategory({
  apiKey,
  idCategory,
}: {
  apiKey: string;
  idCategory: string;
}) {
  const url = `${URL_API}/analysis/parities/${idCategory}`;
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
      throw new Error(
        errorData?.description ||
          "Error al obtener la paridad de una categoría de inscripción"
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchSynergyByCategory({
  apiKey,
  idCategory,
}: {
  apiKey: string;
  idCategory: string;
}) {
  const url = `${URL_API}/analysis/synergies/${idCategory}`;
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
      throw new Error(
        errorData?.description ||
          "Error al obtener la sinergia que describe el desempeño de las parejas."
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchPointsByGroup({
  apiKey,
  idGroup,
}: {
  apiKey: string;
  idGroup: string;
}) {
  const url = `${URL_API}/analysis/groups/${idGroup}/points`;
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
      throw new Error(
        errorData?.description ||
          "Error al obtener los puntos realizados en un grupo."
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchPointsChartByCategory({
  apiKey,
  idCategory,
}: {
  apiKey: string;
  idCategory: string;
}) {
  const { data: groups } = await fetchGroupsByCategory({ apiKey, idCategory });
  const pointsGroupsPromises = groups.map(async (group: Group) => {
    const { data: pointsDataChart } = await fetchPointsByGroup({
      apiKey,
      idGroup: group.id,
    });
    return pointsDataChart;
  });

  const pointsGroups = await Promise.all(pointsGroupsPromises);
  return pointsGroups;
}

export async function fetchPointsComparative(apiKey: string) {
  const url = `${URL_API}/analysis/comparisons/points`;
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
      throw new Error(
        errorData?.description ||
          "Error al obtener los puntos realizados en las categorías de inscripción."
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}

export async function fetchSynergiesComparative(apiKey: string) {
  const url = `${URL_API}/analysis/comparisons/synergies`;
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
      throw new Error(
        errorData?.description ||
          "Error al obtener los puntos realizados en las categorías de inscripción."
      );
    }
    const data = await response.json();
    return data;
  } catch (error) {
    throw error;
  }
}
