compose-start: compose-stop compose-up

compose:
	docker-compose up --abort-on-container-exit --remove-orphans

compose-setup:
	docker-compose build
	docker-compose run app make setup

compose-bash:
	docker-compose run app bash

compose-up:
	docker-compose up --abort-on-container-exit --remove-orphans

compose-install: compose-app-install compose-frontend-install

compose-app-install:
	docker-compose run --rm application composer install

compose-frontend-install:
	docker-compose run --rm frontend npm ci

compose-stop:
	docker-compose stop || true

compose-down:
	docker-compose down -v || true

compose-postgres-start:
	docker-compose up --build -d database

compose-db-prepare:
	docker-compose run application db-prepare

compose-lint:
	docker-compose run application make lint

compose-lint-fix:
	docker-compose run application make lint-fix

compose-test:
	docker-compose run application make test

compose-test-coverage:
	docker-compose run application make test-coverage

compose-check:
	docker-compose run application make check

compose-config-clear:
	docker-compose run application make config-clear

compose-env-prepare:
	docker-compose run application env-prepare

compose-key:
	docker-compose run application make key

make compose-ide-helper:
	docker-compose run application make ide-helper
