test:
	composer phpunit

start:
	php artisan serve

analyze:
	php artisan code:analyze

lint:
	composer phpcs
fix-lint:
	composer phpcbf

.PHONY: test
