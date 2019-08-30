test:
	composer run phpunit

setup:
	composer install
	php artisan key:generate

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
