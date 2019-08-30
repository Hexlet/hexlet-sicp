test:
	composer run phpunit

setup: env key
	composer install

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

.PHONY: test

env:
		cp .env.example .env
key:
		php artisan key:generate
