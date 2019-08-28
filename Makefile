test:
	composer run phpunit

setup:
	composer install

start:
	php artisan serve

analyse:
	php artisan code:analyse

lint:
	composer phpcs

fix-lint:
	composer phpcbf

.PHONY: test
