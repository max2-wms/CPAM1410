# CPAM1410

This project uses Wordpress version 4.7.1 to start with but can be upgraded to whatever the latest version of Wordpress is once the Docker container is up and running.

# Requirements
- a rescent version of Docker for MAC, Docker for Windows or Docker ToolBox..

## Development server

Run `docker-compose -f compose/docker-compose.dev.yml up` for a dev server. Navigate to `//localhost/`.

## Build

Run `docker-compose -f compose/docker-compose.build.yml up` to build the project.
