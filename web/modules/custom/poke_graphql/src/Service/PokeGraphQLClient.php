<?php

namespace Drupal\poke_graphql\Service;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

class PokeGraphQLClient {

  const ENDPOINT = 'https://beta.pokeapi.co/graphql/v1beta';

  public function __construct(protected ClientInterface $httpClient) {}

  /**
   * Raw GraphQL query
   */
  private function query(string $query, array $variables = []): array {
    try {
      $response = $this->httpClient->post(self::ENDPOINT, [
        'json' => ['query' => $query, 'variables' => $variables],
        'headers' => ['Content-Type' => 'application/json'],
        'timeout' => 10,
      ]);
      $data = json_decode((string) $response->getBody(), TRUE);
      return $data['data'] ?? [];
    }
    catch (RequestException $e) {
      throw new \RuntimeException('GraphQL request failed: ' . $e->getMessage(), 0, $e);
    }
  }

  /**
   * Fetch a paginated list of pokemon
   */
  public function getPokemonList(int $limit = 20, int $offset = 0): array {
    $gql = <<<GQL
      query PokemonList(\$limit: Int!, \$offset: Int!) {
        pokemon_v2_pokemon(limit: \$limit, offset: \$offset, order_by: {id: asc}) {
          id
          name
          base_experience
          height
          weight
          pokemon_v2_pokemontypes {
            pokemon_v2_type {
              name
            }
          }
        }
        pokemon_v2_pokemon_aggregate {
          aggregate {
            count
          }
        }
      }
    GQL;
    return $this->query($gql, ['limit' => $limit, 'offset' => $offset]);
  }

  /**
   * Fetch a single pokemon by ID
   */
  public function getPokemon(int $id): array {
    $gql = <<<GQL
      query PokemonDetail(\$id: Int!) {
        pokemon_v2_pokemon(where: {id: {_eq: \$id}}) {
          id
          name
          base_experience
          height
          weight
          pokemon_v2_pokemontypes {
            pokemon_v2_type { name }
          }
          pokemon_v2_pokemonabilities {
            pokemon_v2_ability { name }
          }
          pokemon_v2_pokemonstats {
            base_stat
            pokemon_v2_stat { name }
          }
          pokemon_v2_pokemonsprites {
            sprites
          }
        }
      }
    GQL;
    $data = $this->query($gql, ['id' => $id]);
    return $data['pokemon_v2_pokemon'][0] ?? [];
  }

}
