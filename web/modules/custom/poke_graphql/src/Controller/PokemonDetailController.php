<?php

namespace Drupal\poke_graphql\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\poke_graphql\Service\PokeGraphQLClient;
use Symfony\Component\DependencyInjection\ContainerInterface;

class PokemonDetailController extends ControllerBase {

  public function __construct(protected PokeGraphQLClient $client) {}

  public static function create(ContainerInterface $container): static {
    return new static($container->get('poke_graphql.poke_client'));
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
      '#theme' => 'poke_graphql_detail',
      '#pokemon' => $pokemon,
      '#error' => $error,
      '#cache' => ['max-age' => 300],
    ];
  }

}
