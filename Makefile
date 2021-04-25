include make-compose.mk

deploy:
	git push heroku master

setup: env-prepare sqlite-prepare install key db-prepare ide-helper
	npm run dev

app-install:
	composer install

frontend-install:
	npm ci

install: app-install frontend-install

start:
	heroku local -f Procfile.dev

db-prepare:
	php artisan migrate:fresh --seed

lint:
	composer exec phpcs -v

lint-fix:
	composer exec phpcbf -v

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

analyse:
	composer exec phpstan analyse -v

check: lint analyse test

config-clear:
	php artisan config:clear

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

.PHONY: test
