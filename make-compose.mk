compose-start: compose-stop compose-up

compose:
	heroku local -f Procfile.dev

compose-setup:
	docker-compose build
	docker-compose run app make setup

compose-bash:
	docker-compose run app bash

compose-up:
	docker-compose up

compose-stop:
	docker-compose stop

compose-down:
	docker-compose down -v || true

compose-postgres-start:
	docker-compose up --build -d db

compose-test:
	docker-compose run app make test

compose-test-coverage:
	docker-compose run app make test-coverage

compose-lint:
	docker-compose run app make lint

compose-lint-fix:
	docker-compose run app make lint-fix

compose-config-clear:
	docker-compose run app make config-clear

compose-key:
	docker-compose run app make key
