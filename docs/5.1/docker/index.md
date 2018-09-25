---
layout: page
title: Docker
permalink: /docs/5.1/docker
version: 5.1
order: 4
---

WP Foundation Six Developer Framework uses docker for it's server stack, if you use MAMP, XAMP, WAMP, or AMPPS just set your project directory to start under the public_html directory. DO NOT use these docker services/containers in a production environment, these are only meant to support a development workflow.

The `./docker-compose.yml` contains the instructions for creating 5 services/containers that will be used as your LEMP stack. Once you install [Docker](https://www.docker.com/) on your host machine run the following command to start the services/containers.

```bash
docker-compose up -d
```

Use the following command to list the all services/containers

```bash
docker container list -a
```

To stop and remove all Docker services/containers

```bash
docker-compose down
```

The default URL for this project will be served under `http://localhost`, to access phpmyadmin go to `http://localhost:8000`. I have included one service/container that will allow you to run all the command line tools needed to start up the project. After running `docker container list -a`, you'll see a service with the image named digitalblake/general-cli. Take the ID for this service/container and run the following command:

```bash
docker exec -it put_the_id_here zsh
```

This will take you into the service/container using ZSH and will give you access to vim, git, Composer, NPM, Bower, WP-CLI, Yarn, and Gulp. This way you don't have to install these CLI tools on your host machine. WARNING: You will be running under root when in this container, never use `rm -rf` and be mindful of what you are doing.

The docker images for this project can be found in this repo: [https://github.com/Blake-C/docker-images](https://github.com/Blake-C/docker-images)
