# Frontend Developer

[Task description](Frontend-Developer-POC.md)

### Why you selected the chosen GraphQL API

https://pokeapi.co/ - just a personal preference. Also, the API is free & open.

### Your architecture approach

Drupal custom Module and Theming system. API logic moved to service layer with DI. Controllers for routing and Twig-based templates for rendering.

### How you structured the GraphQL integration

Registered as a service (GuzzleHttp inside) in Drupal *.services.yml and later initialised with Drupal DI.

### Your CSS/styling strategy

Global plain CSS with BEM naming convention. Connected with *.libraries.yml.
Would use SCSS and structure in a more modular way if I had more time.

### Improvements you would implement with more time

- More precisely follow the task description (filtering by type/name, etc.).
- Better styling and CSS management (SCSS, component splitting).
- Caching of GraphQL responses.
- For a better understanding of Drupal - I would dive deeper into debugging optimisations and Drupal architecture.
