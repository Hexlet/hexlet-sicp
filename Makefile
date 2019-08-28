test:
	composer phpunit

install:
	composer install
	composer run-script post-root-package-install
	composer run-script post-create-project-cmd

start:
	php artisan serve

analyse:
	php artisan code:analyse

lint:
	composer phpcs

fix-lint:
	composer phpcbf

.PHONY: test
