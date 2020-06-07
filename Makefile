test:
	php artisan test

test-coverage:
	php artisan test --coverage-clover build/logs/clover.xml

setup: env-prepare sqlite-prepare install key db-prepare

compose-setup: compose-postgres-start config-clear db-prepare

install:
	composer install
	npm install

start:
	heroku local -f Procfile.dev

db-prepare:
	php artisan migrate --seed

lint:
	composer phpcs

lint-fix:
	composer phpcbf

config-clear:
	php artisan config:clear

deploy:
	git push heroku master

env-prepare:
	cp -n .env.example .env || true

sqlite-prepare:
	touch database/database.sqlite

key:
	php artisan key:generate

ide-helper:
	php artisan ide-helper:eloquent
	php artisan ide-helper:gen
	php artisan ide-helper:meta
	php artisan ide-helper:mod -n

compose-postgres-start:
	docker-compose up --build -d

.PHONY: test
