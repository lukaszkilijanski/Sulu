# include .env
DOCKER_COMPOSE = docker compose
COMPOSE_FILE = docker-compose.local.yml

.PHONY: up
up:
	@if [ "$(env)" = "testing" ]; then \
		COMPOSE_FILE=docker-compose.testing.yml; \
	fi

	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) up -d

	# copy .env .env.example
	# composer install
	# bin/adminconsole sulu:build dev
	# bin/console doctrine:fixtures:load

.PHONY: down
down:
	$(DOCKER_COMPOSE) -f docker-compose.local.yml down
