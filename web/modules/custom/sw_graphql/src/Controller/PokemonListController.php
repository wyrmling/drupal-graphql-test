<?php

namespace Drupal\sw_graphql\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\sw_graphql\Service\PokeGraphQLClient;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;

class PokemonListController extends ControllerBase {

  public function __construct(protected PokeGraphQLClient $client) {}

  public static function create(ContainerInterface $container): static {
    return new static($container->get('sw_graphql.poke_client'));
  }

  public function list(Request $request): array {
    $page = max(0, (int) $request->query->get('page', 0));
    $limit = 20;
    $offset = $page * $limit;
    $error = NULL;
    $items = [];
    $total = 0;

    try {
      $data  = $this->client->getPokemonList($limit, $offset);
      $items = $data['pokemon_v2_pokemon'] ?? [];
      $total = $data['pokemon_v2_pokemon_aggregate']['aggregate']['count'] ?? 0;
    }
    catch (\RuntimeException $e) {
      $error = $e->getMessage();
    }

    $totalPages = $limit > 0 ? (int) ceil($total / $limit) : 1;

    return [
      '#theme' => 'sw_graphql_list',
      '#items' => $items,
      '#error' => $error,
      '#page' => $page,
      '#total_pages' => $totalPages,
      '#cache' => ['max-age' => 300],
    ];
  }

}
