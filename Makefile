include make-compose.mk

console:
	php artisan tinker

deploy:
	git push heroku main

setup: env-prepare sqlite-prepare install key db-prepare ide-helper
	npm run development

install-app:
	composer install

install-frontend:
	npm ci

install: install-app install-frontend

start:
	heroku local -f Procfile.dev

start-app:
	php artisan serve --host 0.0.0.0 --port 8000

start-frontend:
	npm run watch

db-prepare:
	php artisan migrate:fresh --seed

lint: lint-js lint-php

lint-fix:
	composer exec phpcbf -v

test:
	php artisan test

test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml

analyse:
	composer exec phpstan analyse -v -- --memory-limit=1G

check: lint analyse test

config-clear:
	php artisan config:clear

env-prepare:
	ls -la
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

pre-push-hook: lint
