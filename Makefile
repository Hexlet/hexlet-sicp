test:
	composer run phpunit

setup: env
	composer install
	$(MAKE) key

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

env:
	cp .env.example .env
key:
	php artisan key:generate

.PHONY: test
