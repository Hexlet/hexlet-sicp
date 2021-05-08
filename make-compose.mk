compose: compose-clear compose-build compose-setup compose-start

compose-start:
	docker-compose up --abort-on-container-exit

compose-stop:
	docker-compose stop || true

compose-down:
	docker-compose down --remove-orphans || true

compose-clear:
	docker-compose down -v --remove-orphans || true

compose-logs:
	docker-compose logs -f

compose-setup:
	docker-compose build
	docker-compose run --rm application make setup

compose-bash:
	docker-compose run --rm application bash

compose-build:
	docker-compose build

compose-install: compose-app-install compose-frontend-install

compose-app-install:
	docker-compose run --rm application composer install

compose-frontend-install:
	docker-compose run --rm frontend npm ci

compose-database-start:
	docker-compose up --build -d database

compose-database-stop:
	docker-compose stop database

compose-db-prepare:
	docker-compose run --rm application db-prepare

compose-lint:
	docker-compose run --rm application make lint

compose-lint-fix:
	docker-compose run --rm application make lint-fix

compose-test:
	docker-compose run application make test

compose-test-coverage:
	docker-compose run --rm application make test-coverage

compose-check:
	docker-compose run --rm application make check
