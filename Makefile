test:
	composer run phpunit

setup: env-prepare sqlite-prepare install key db-prepare self-check

install:
	composer install
	npm install

start:
	heroku local -f Procfile.dev

db-prepare:
	php artisan migrate --seed

analyse:
	php artisan code:analyse

lint:
	composer phpcs

fix-lint:
	composer phpcbf

deploy:
	git push heroku master

env-prepare:
	cp -n .env.example .env || true

sqlite-prepare:
	touch database/database.sqlite

key:
	php artisan key:generate

self-check:
	php artisan self-diagnosis

.PHONY: test
