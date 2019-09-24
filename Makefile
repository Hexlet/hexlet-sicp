.PHONY: test
test:
	composer run phpunit

.PHONY: setup
setup:
	env-prepare install key

.PHONY: install
install:
	composer install
	npm install

.PHONY: start
start:
	heroku local -f Procfile.dev

.PHONY: analyse
analyse:
	php artisan code:analyse

.PHONY: lint
lint:
	composer phpcs

.PHONY: fix-lint
fix-lint:
	composer phpcbf

.PHONY: deploy
deploy:
	git push heroku master

.PHONY: env-prepare
env-prepare:
	cp -n .env.example .env || true

.PHONY: key
key:
	php artisan key:generate
