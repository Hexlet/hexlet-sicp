test:
	composer run phpunit

setup: env-prepare install key

install:
	composer install
	npm install

start:
	heroku local -f Procfile.dev

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

key:
	php artisan key:generate

.PHONY: test
