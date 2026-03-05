<?php

namespace Drupal\sw_graphql\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\sw_graphql\Service\PokeGraphQLClient;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PokemonDetailController extends ControllerBase {

  public function __construct(protected PokeGraphQLClient $client) {}

  public static function create(ContainerInterface $container): static {
    return new static($container->get('sw_graphql.poke_client'));
  }

  public function detail(int $id): array {
    $error = NULL;
    $pokemon = [];

    try {
      $pokemon = $this->client->getPokemon($id);
    }
    catch (\RuntimeException $e) {
      $error = $e->getMessage();
    }

    return [
      '#theme' => 'sw_graphql_detail',
      '#pokemon' => $pokemon,
      '#error' => $error,
      '#cache' => ['max-age' => 300],
    ];
  }

}
