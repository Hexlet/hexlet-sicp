test:
	composer phpunit

install:
	composer install

start:
	php artisan serve

analyze:
	php artisan code:analyze

lint:
	composer phpcs

fix-lint:
	composer phpcbf

.PHONY: test
