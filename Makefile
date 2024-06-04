
include make-compose.mk

PORT ?= 8000

console:
	php artisan tinker

deploy:
	git push heroku main

setup: env-prepare sqlite-prepare install key db-prepare ide-helper
	npm run build

install-app:
	composer install

install-frontend:
	npm ci

install: install-app install-frontend

start:
	heroku local -f Procfile.dev

start-app:
	php artisan serve --host 0.0.0.0 --port ${PORT}

start-frontend:
	npm run dev

db-prepare:
	php artisan migrate:fresh --force --seed

lint: lint-js lint-php

lint-fix:
	composer exec phpcbf -v
	npx prettier --write resources/**/*.blade.php

test:
	php artisan test

test-solutions:
	composer exec phpunit -- --testsuite "Exercises"

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

analyse:
	composer exec phpstan analyse -v -- --memory-limit=512M

check: test lint analyse

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

lint-js:
	npm run lint-js

lint-php:
	composer exec phpcs -v

lint-js-fix:
	npm run lint-js-fix

setup-git-hooks:
	npx simple-git-hooks

.PHONY: test

pre-push-hook: lint analyse

docker-build-render:
	DOCKER_BUILDKIT=1 COMPOSE_DOCKER_CLI_BUILD=1 docker build . -t hexlet-sicp:cached
