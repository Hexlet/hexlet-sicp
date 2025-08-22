# Hexlet SICP 

[![github action status](https://github.com/Hexlet/hexlet-sicp/actions/workflows/master.yml/badge.svg)](https://github.com/Hexlet/hexlet-sicp/actions)

[![codecov](https://codecov.io/gh/Hexlet/hexlet-sicp/branch/master/graph/badge.svg)](https://codecov.io/gh/Hexlet/hexlet-sicp)

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

Read this in another language: [Русский](README.ru.md)

Hexlet SICP is a service for those studying the book Structure and Interpretation of Computer Programs. Track your progress and match yourself against others on the global leaderboard.

[How to study _Structure and Interpretation of Computer Programs_ (SICP)](https://guides.hexlet.io/how-to-learn-sicp/)

## For contributors

* Discuss the project on Telegram: https://t.me/hexletcommunity/12

### Recorded meetings

* [Recorded meetings playlist](https://www.youtube.com/playlist?list=PL37_xn2SVZdCJ-xgB-phFaWrp25Kc3cLk)

## FAQ

Q: I get this error `Illuminate\Session\TokenMismatchException: CSRF token mismatch.`
A: Reset your config cache `php artisan config:clear`

## Requirements

Run `composer check-platform-reqs` to check PHP deps:

* PHP ^8.3
* Composer
* Node.js (v16+) & NPM (6+)
* SQLite for local, PostgreSQL for production
* [heroku cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install); [How to deploy Laravel on Heroku](https://ru.hexlet.io/blog/posts/kak-razvernut-prilozhenie-laravel-na-heroku) (in Russian)

[What is a Version Manager?](https://guides.hexlet.io/version-managers/)

## Setup

### Local setup

To run on the local interpreter and SQLite:

```sh
make setup # set up the project
make start # start server at http://127.0.0.1:8000/
make test # run tests
```

### Running on PostgreSQL (deployed in a Docker container)

1. Install deps and prepare the config file

    ```sh
    make setup
    ```

2. Put your database credentials in the *.env* file

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=localhost
    DB_PORT=54320
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Start the database container and seed

    ```sh
    make compose-start-database
    make db-prepare
    ```

4. Run the local server

    ```sh
    make start
    ```

### Setup in Docker

1. Prepare the `.env` file

    ```sh
    make env-prepare
    ```

2. Put your database credentials in the `.env` file

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=database
    DB_PORT=5432
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Build and start the app

    ```sh
    make compose-setup # build project
    make compose-start # start server at http://127.0.0.1:8000/
    ```

    ```sh
    make compose-bash  # start bash session inside docker container
    make test          # run tests inside docker container
    ```

## Coding stardards and other rules

* Pull requests should be as small as reasonably possible
* All code must comply with the PSR12 and Laravel standards (we also use some custom rules for added challenge)
* Every pull request must pass all tests
* All controller actions must have test coverage ([Start writing (appropriate) tests](https://ru.hexlet.io/blog/posts/how-to-test-code) (in Russian))
* The forms are made using [laraeast/laravel-bootstrap-forms](https://github.com/laraeast/laravel-bootstrap-forms)
* RoR's resource routing convention is used for the most part. In a very rare case when a route doesn't seem to fit the convention, it should be discussed first
* All strings must be stored in locale files
* To enable Rollbar logging, set the variable `LOG_CHANNEL=rollbar` and `ROLLBAR_TOKEN=` ([docs](https://docs.rollbar.com/docs/laravel))
* To add an exercise, put its contents (a listing or pic) at `resources/views/exercise/listing/#_#.blade.php` and its text description, at `resources/lang/{locale}/sicp.php` under the key `exercises.#.#` (mind the locale).
* To generate helper files (for autocompletion), use `make ide-helper`
* Run `php artisan` and check out all available commands!

## GitHub Auth Setup Guide

Integrate the app with your GitHub account (read more at https://developer.github.com/apps/about-apps/). To integrate the app:

* Enter your GitHub account and go to _Settings_
* On the right, choose _GitHub Apps_, then push _New GitHub App_
* A form will pop up. In the _GitHub App name_ field, type the app name (for example, _Hexlet-SICP_)
* In _Homepage URL_, put the web address hosting your deploy (for example, _https://hexlet-sicp.herokuapp.com_)
* In _User authorization callback URL_, put the URL to redirect to, once a user authorizes via GitHub. (for example, _https://hexlet-sicp.herokuapp.com/oauth/github/callback_)
* In _Webhook URL_, put the URL to dispatch events to (for example, _https://hexlet-sicp.herokuapp.com/oauth/github/callback_)
* Set the permission to access email (_User permissions->Email addresses->Read only_)
* Save the app settings (push _Create GitHub App_)
* The app page will open. Copy the Client ID and Client secret
* Generate a private key (push _Generate a private key_)

If deployed on Heroku, set the environment variables for your deploy. To set environment variables:

* Open _Settings_
* In the _Config Vars_ setting, add the following variables: GITHUB_CLIENT_ID, GITHUB_CLIENT_SECRET and GITHUB_URL_REDIRECT and set them to the respective Client ID, Client secret and User authorization callback URL
* Then, reset the configuration cache: ```heroku run php artisan config:cache```

### Setting up a testing database

1. Create a separate Postgres database.
   Connection settings are available in the `pgsql_test` section of `config/database.php`.
   How to set up a test database from scratch:

    ```shell
    sudo apt install postgresql
    sudo -u postgres createuser --createdb $(whoami)
    sudo -u postgres createuser hexlet_sicp_test_user
    sudo -u postgres psql -c "ALTER USER hexlet_sicp_test_user WITH ENCRYPTED PASSWORD 'secret'"
    createdb hexlet_sicp_test
    ```

2. Run tests on your testing database: `DB_CONNECTION=pgsql_test make test`

### Adding a pre-commit hook

```shell
git config core.hooksPath .githooks
```

##

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://hexlet.io/?utm_source=github&utm_medium=link&utm_campaign=exercises-sicp)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet](https://hexlet.io/?utm_source=github&utm_medium=link&utm_campaign=exercises-sicp).
