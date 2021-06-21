[![github action status](https://github.com/Hexlet/hexlet-sicp/actions/workflows/master.yml/badge.svg)](https://github.com/Hexlet/hexlet-sicp/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/maintainability)](https://codeclimate.com/github/Hexlet/hexlet-sicp/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3cf6169da8c64d048b1a807487c9cadc)](https://www.codacy.com/manual/fey/hexlet-sicp?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=fey/hexlet-sicp&amp;utm_campaign=Badge_Grade)
[![codecov](https://codecov.io/gh/Hexlet/hexlet-sicp/branch/master/graph/badge.svg)](https://codecov.io/gh/Hexlet/hexlet-sicp)

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

Read this in: [Russian](README.md)

# hexlet-sicp

Hexlet SICP is a service for those studying the book Structure and Interpretation of Computer Programs. Track your progress and match yourself against others on the global leaderboard.

### Contribute

* Discuss the project in #hexlet-volunteers on Slack: http://slack-ru.hexlet.io (in Russian)

### Requirements
To check PHP deps, run `composer check-platform-reqs`
* PHP ^8.0
* Extensions:
   - bcmath
   - curl
   - dom
   - exif
   - fileinfo
   - filter
   - json
   - libxml
   - mbstring
   - openssl
   - pcre
   - PDO
   - pgsql
   - Phar
   - SimpleXML
   - sqlite3
   - tokenizer
   - xml
   - xmlwriter
   - zip
* Composer
* Node.js (v14+) & NPM (6+)
* SQLite for local, PostgreSQL for production
* [heroku cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install); [How to deploy the app on Heroku (in Russian)](https://ru.hexlet.io/blog/posts/kak-razvernut-prilozhenie-laravel-na-heroku)

FIXME: check and update readme.

### Setup or [Setup in Docker](#setup-in-docker)

```sh
$ make setup
$ make start # start server http://127.0.0.1:8000/
$ make test # run tests
```

### Setup with PostgreSQL (deployed in a Docker container)

1. Install deps and prepare the config file
```sh
$ make env-prepare
$ make install
$ make key
```

2. Put the database credentials in the .env file

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=54320
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

3. Launch the database container and seed
```sh
$ make compose-postgres-start
$ make config-clear
$ make db-prepare
```

4. Launch the local web server
```sh
$ make start
```

### Setup in Docker

1. Prepare the `.env` file
```sh
$ make env-prepare
```

2. Put the database credentials in the `.env` file
```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=hexlet_sicp_development
DB_USERNAME=postgres
DB_PASSWORD=secret
DB_SCHEMA=public
```

3. Build and start the app
```sh
$ make compose-setup # build project
$ make compose-start # start server http://127.0.0.1:8000/
```
```sh
$ make compose-bash  # start bash session inside docker container
$ make test          # run tests inside docker container
```

### Standards

* Pull requests should be as small as reasonably possible
* All code must comply with the PSR and Laravel standards
* Every pull request must pass all tests

#### Technical stuff

* All controller actions must have test coverage
* The forms are made using [netojose/laravel-bootstrap-4-forms](https://github.com/netojose/laravel-bootstrap-4-forms)
* The resource routing convention is used for the most part. If your route does not seem to fit the convention (a very rare occurrence), it should be discussed first
* All strings must be stored in locale files
* To enable Rollbar logging, set the variable `LOG_CHANNEL=rollbar` и `ROLLBAR_TOKEN=` ([docs](https://docs.rollbar.com/docs/laravel))
* To add an exercise, put its contents (a listing or pic) at `resources/views/exercise/listing/#_#.blade.php` and its text description, at `resources/lang/{locale}/sicp.php` under the key `exercises.#.#` (mind the locale)
* To generate helper files (for autocompletion), use `make ide-helper`
* Run `php artisan` to check all available commands!


#### Setting up GitHub auth

Integrate the app with your GitHub account (read more at https://developer.github.com/apps/about-apps/). To integrate the app:
* Enter your GitHub account and go to _Settings_
* On the right, choose _GitHub Apps_, then push _New GitHub App_
* A form will pop up. In the _GitHub App name_ field, type the app name (for example, _Hexlet-SICP_)
* In _Homepage URL_, put your app's web domain (for example, _https://hexlet-sicp.herokuapp.com_)
* In _User authorization callback URL_, put the URL to redirect to once a user authorizes via GitHub. (for example, _https://hexlet-sicp.herokuapp.com/oauth/github/callback_)
* In _Webhook URL_, put the URL to dispatch events to (for example, _https://hexlet-sicp.herokuapp.com/oauth/github/callback_)
* Set the permission to access email (_User permissions->Email addresses->Read only_)
* Save the app settings (push _Create GitHub App_)
* The app's page will open. Copy the Client ID and Client secret
* Generate a private key (push _Generate a private key_)

When deploying on Heroku, set the environment variables for your deployed app. To set the environment variables:
* Go to _Settings_
* In the _Config Vars_ setting, add the following variables: GITHUB_CLIENT_ID, GITHUB_CLIENT_SECRET and GITHUB_URL_REDIRECT and set them to the respective Client ID, Client secret and User authorization callback URL
* Then, reset the configuration cache: ```heroku run php artisan config:cache```

#### Setting up a testing database 

1. Create a separate Postgres database.  
   Connection settings are available in the `pgsql_test` section of `config/database.php`.
   To create a testing database from scratch:
```shell
sudo apt install postgresql
sudo -u postgres createuser --createdb $(whoami)
sudo -u postgres createuser hexlet_sicp_test_user
sudo -u postgres psql -c "ALTER USER hexlet_sicp_test_user WITH ENCRYPTED PASSWORD 'secret'"
createdb hexlet_sicp_test
```
2. Run tests on your testing database `DB_CONNECTION=pgsql_test make test`

#### Adding a pre-commit hook

```shell
$ git config core.hooksPath .githooks
```

#### Recorded meetings
* [Recorded meetings playlist](https://www.youtube.com/playlist?list=PL37_xn2SVZdCJ-xgB-phFaWrp25Kc3cLk)

##
[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript).

## FAQ
Q: I get this error: `Illuminate\Session\TokenMismatchException: CSRF token mismatch.`
A: Reset your config cache: `php artisan config:clear`
