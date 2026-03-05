**Frontend Developer POC – Drupal + GraphQL Integration**

# Context

We are developing a platform that consumes data from external services via GraphQL APIs.

As part of expanding our frontend team, we would like to evaluate your ability to:

- Integrate Drupal with a public GraphQL API
- Structure a clean and scalable frontend implementation
- Apply solid CSS and responsive design practices
- Deliver maintainable, production-ready code



# Scope of the Exercise

You are asked to:

1. Set up a Drupal project (Drupal 10 or newer preferred)
2. Integrate it with a public GraphQL API
3. Build:
  - One listing page
  - One detail page
4. Apply clean, structured CSS with responsive behavior


# GraphQL API Selection

You may use **any public GraphQL API** of your choice.

## Constraints

- Must be publicly accessible
- Must not require paid access
- Must allow:
  - Listing a collection of items
  - Retrieving a single item by ID (or unique identifier)
- Each item must expose:
  - At least 4–5 fields
  - At least one nested field (object or array)

## In your README, include:

- The API endpoint used
- Why you selected it
- Any limitations encountered
- If unsure, you may use:
  - Countries GraphQL API
  - GraphQLPlaceholder
  - Pokémon GraphQL API


# Page 1 – Listing Page

**Example Route**

```/items```

## Requirements

Display a list of items retrieved from the GraphQL API.

Each item must display:

- Title or Name
- Unique Identifier
- 2–3 additional relevant fields
- A link to the detail page

## Functional Expectations

- Data must come from GraphQL (no hardcoded data)
- Proper loading state
- Proper error state
- Graceful empty state
- Clean and semantic markup
- Optional (bonus):
  - Pagination
  - Basic filtering


# Page 2 – Detail Page

**Example Route**

```/items/{id}```

## Requirements

Display detailed information about one selected item.

Must include:
- Main title/name
- Unique identifier
- Major fields returned by the API
- Nested data (if available)

## Functional Expectations

- Dynamic routing
- GraphQL query using the ID parameter
- Proper error handling if item is not found
- Clear layout and structure


# Frontend & CSS Expectations

In addition to functionality, we will evaluate frontend quality and CSS implementation.

## Layout & Responsiveness

- The layout must be responsive
- Support at least:
  - Mobile view
  - Desktop view
- Use a consistent layout structure (grid or flexbox)
- Avoid layout breaking on smaller screens

** **

## Styling Quality

- Clear typography hierarchy
- Consistent spacing system (e.g., `4px/8px` scale)
- Visual separation between sections
- Buttons and links must have hover and focus states
- No inline styles
- Avoid excessive duplication of styles

## CSS Structure

- Use structured and maintainable CSS
- Meaningful class naming
- Avoid deeply nested or overly specific selectors
- Styles should be organized logically
- You may use:
  - Plain CSS
  - SCSS
  - CSS modules

** **

# Deliverables

## Live Demonstration

You will be asked to present your solution during a demonstration call.

## Short Written Explanation (Max 1 Page)

Please provide a brief document covering:

- Why you selected the chosen GraphQL API
- Your architecture approach
- How you structured the GraphQL integration
- Your CSS/styling strategy
- Improvements you would implement with more time
