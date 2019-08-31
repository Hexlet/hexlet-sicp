SHELL=/bin/bash -e

.DEFAULT_GOAL := help

help: ## This help
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)
	
test:
	composer run phpunit

setup: env
	composer install
	$(MAKE) key

start:
	php artisan serve

analyse:
	php artisan code:analyse

lint:
	composer phpcs

fix-lint:
	composer phpcbf

deploy:
	git push heroku master

env:
	cp .env.example .env

key:
	php artisan key:generate

.PHONY: test

include docker.env
export $(shell sed 's/=.*//' docker.env)


ifndef VIRTUAL_HOST
$(error The VIRTUAL_HOST variable is missing.)
endif

ifndef COMPOSE_PROJECT_NAME
$(error The COMPOSE_PROJECT_NAME variable is missing.)
endif

prepare-db: migrate db-seed ## Run migrate and seeds

prepare-app: composer-install cenv key-generate cert-generate build-assets ## Run common project settings
	@echo -e "Make: App is completed. \n"

clean:
	@docker system prune --volumes --force

up: ## Up containers
	@echo -e "Make: Up containers.\n"
	@docker-compose -f docker-compose.yml -p $project_name up -d --force-recreate
	@echo -e "Make: Visit https://${VIRTUAL_HOST} .\n"

migrate:
	@echo -e "Make: Database migration.\n"
	@docker-compose -f docker-compose.yml -p $project_name run app php artisan migrate --force

db-seed:
	@echo -e "Make: Database seeding.\n"
	@docker-compose -f docker-compose.yml -p $project_name run app php artisan db:seed --force

db-fresh: ## Fresh database with seeds
	@echo -e "Make: Fresh database.\n"
	@docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" sh -c "php artisan migrate:fresh --seed --force"

logs: ## Show docker containers logs
	@docker-compose -f docker-compose.yml -p $project_name logs --follow

stop: ## Stop docker containers
	@docker-compose -f docker-compose.yml -p $project_name stop

build: ## Build\rebuild all containers
	@docker-compose -f docker-compose.yml -p $project_name build

composer-install:
	@echo -e "Make: Installing composer dependencies.\n"
	@docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" sh -c "composer install"

cenv:
	@echo -e "Make: Сopying env file.\n"
	@docker exec -it "${COMPOSE_PROJECT_NAME}_app_1"  sh -c "cp .env.docker.example .env"

key-generate:
	@echo -e "Make: Generate Laravel key.\n"
	@docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" sh -c "php artisan key:generate"

cert-generate:
	@echo -e "Make: Generate self-sign certifications.\n"
	@mkcert ${VIRTUAL_HOST}
	@mv ./${VIRTUAL_HOST}.pem ./storage/certs/${VIRTUAL_HOST}.crt
	@mv ./${VIRTUAL_HOST}-key.pem ./storage/certs/${VIRTUAL_HOST}.key

helper-generate:
	@docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" sh -c "php artisan ide-helper:eloquent && php artisan ide-helper:generate && php artisan ide-helper:meta && php artisan ide-helper:models"

npm-install:
	@docker exec -it "${COMPOSE_PROJECT_NAME}_node_1"  sh -c "npm i"
	@echo -e "Make: App is completed. \n"

build-assets: npm-install ## Build all assets (js, css, etc)
	@docker exec -it "${COMPOSE_PROJECT_NAME}_node_1"  sh -c "npm run prod"
	@echo -e "Make: App is completed. \n"

bash: ## Enter to the app container
	docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" bash

ctest:
	docker exec -it "${COMPOSE_PROJECT_NAME}_app_1" sh -c "composer run phpunit"


default: help
