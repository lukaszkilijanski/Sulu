-include .env
DOCKER_COMPOSE = docker compose
COMPOSE_FILE = docker-compose.local.yml

.PHONY: up
up:
	@if [ "$(env)" = "testing" ]; then \
		$(DOCKER_COMPOSE) -f docker-compose.testing.yml up -d; \
	fi

	$(DOCKER_COMPOSE) -f $(COMPOSE_FILE) up -d; \

.PHONY: down
down:
	$(DOCKER_COMPOSE) -f docker-compose.local.yml down