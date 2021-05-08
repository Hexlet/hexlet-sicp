[![Maintainability](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/maintainability)](https://codeclimate.com/github/Hexlet/hexlet-sicp/maintainability)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/3cf6169da8c64d048b1a807487c9cadc)](https://www.codacy.com/manual/fey/hexlet-sicp?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=fey/hexlet-sicp&amp;utm_campaign=Badge_Grade)
[![codecov](https://codecov.io/gh/Hexlet/hexlet-sicp/branch/master/graph/badge.svg)](https://codecov.io/gh/Hexlet/hexlet-sicp)
[![build status](https://travis-ci.org/Hexlet/hexlet-sicp.svg?branch=master)](https://travis-ci.com/Hexlet/hexlet-sicp)
[![github action status](https://github.com/Hexlet/hexlet-sicp/workflows/Main%20workflow/badge.svg)](https://github.com/Hexlet/hexlet-sicp/actions)

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

# hexlet-sicp

Осилятор СИКП &mdash; сервис, в котором есть рейтинг тех, кто проходит СИКП, и каждый отмечает, что он прошёл.

### Участие

* Обсуждение в канале #hexlet-volunteers слака http://slack-ru.hexlet.io

### Requirements
Проверить зависимости PHP можно командой `composer check-platform-reqs`
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
* [heroku cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install) [Как развернуть приложение на Heroku](https://ru.hexlet.io/blog/posts/kak-razvernut-prilozhenie-laravel-na-heroku)

FIXME: проверить и актулизировать ридми.

### Setup или [Setup in docker](#setup-in-docker)

```sh
$ make setup
$ make start # start server http://127.0.0.1:8000/
$ make test # run tests
```

### Запуск с БД PostgreSQL (разворачивается в docker-контейнере)

1. Установить зависимости и подготовить конфигурационный файл
```sh
$ make env-prepare
$ make install
$ make key
```

2. Указать параметры подключения к БД в файле .env

```
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=54320
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

3. Запустить контейнер с БД и сгенерировать записи
```sh
$ make compose-postgres-start
$ make config-clear
$ make db-prepare
```

4. Запустить локальный веб-сервер
```sh
$ make start
```

### Setup in docker

1. Подготовить `.env` файл
```sh
$ make env-prepare
```

2. Указать параметры подключения к БД в файле `.env`
```
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=hexlet_sicp_development
DB_USERNAME=postgres
DB_PASSWORD=secret
DB_SCHEMA=public
```

3. Собрать и запустить приложение
```sh
$ make compose-setup # build project
$ make compose-start # start server http://127.0.0.1:8000/
```
```sh
$ make compose-bash  # start bash session inside docker container
$ make test          # run tests inside docker container
```

### Стандарты

* Пулреквесты должны быть настолько маленькими, насколько это возможно с точки зрения здравого смысла
* Весь код должен соответствовать стандартам кодирования PSR и Laravel
* Пулреквест должен проходить все проверки

#### Прикладные вещи

* Все экшены контроллеров должны быть покрыты тестами
* Формы делаются с помощью [netojose/laravel-bootstrap-4-forms](https://github.com/netojose/laravel-bootstrap-4-forms)
* В подавляющем большинстве используется ресурсный роутинг. Что под него не подходит, сначала обсуждается (такое бывает крайне редко)
* Тексты только через локали
* Чтобы включить логирование Rollbar, необходимо установить переменную `LOG_CHANNEL=rollbar` и `ROLLBAR_TOKEN=` ([docs](https://docs.rollbar.com/docs/laravel))
* Чтобы добавить упражнение, необходимо добавить его содержимое (код или картинка) по пути `resources/views/exercise/listing/#_#.blade.php`, а текстовое описание в `resources/lang/{locale}/sicp.php` под ключем `exercises.#.#` на соответствующем языке.
* Для генераций файлов-помощников (для автодополнения) используйте `make ide-helper`
* Изучите список доступных команд `php artisan`!


#### Настройка авторизации через GitHub

Зарегистрируйте приложение на GitHub (подробнее https://developer.github.com/apps/about-apps/). Для этого:
* В меню учетной записи GitHub выберите пункт “Settings”
* В открывшемся окне в панели навигации, справа, выберите “GitHub Apps”, затем нажмите кнопку “New GitHub App”
* В открывшейся форме в поле "GitHub App name" введите название приложения (например, Hexlet-SICP)
* В поле Homepage URL - адрес ресурса (например, https://hexlet-sicp.herokuapp.com)
* В поле "User authorization callback URL" введите полный URL-адрес для перенаправления после того, как пользователь авторизует приложение на GitHub. (например, https://hexlet-sicp.herokuapp.com/oauth/github/callback)
* В поле "Webhook URL" укажите URL-адрес, по которому будут отправляться события (например, https://hexlet-sicp.herokuapp.com/oauth/github/callback)
* Откройте права на получение информации о e-mail пользователя (User permissions->Email addresses->Read only)
* Сохраните данные регистрации приложения (кнопка "Create GitHub App")
* На открывшейся странице приложения скопируйте Client ID и Client secret
* Cгенерируйте закрытый ключ (кнопка Generate a private key)

В случае деплоя на Heroku, задайте переменные окружения для развернутого приложения. Для этого:
* Перейдите на вкладку "Settings"
* В настройке "Config Vars" добавьте переменные GITHUB_CLIENT_ID, GITHUB_CLIENT_SECRET и GITHUB_URL_REDIRECT указав для них соответвенно значения Client ID, Client secret и User authorization callback URL
* После чего выпольните сброс кеша конфигурации: ```heroku run php artisan config:cache```

#### Альтернативный профиль БД для тестирования

1. Создать отдельную тестовую базу postgres.  
Настройки параметров подключения можно посмотреть в секции `pgsql_test` конфигурации `config/database.php`
Пример создания тестовой базы "с нуля":
```shell
sudo apt install postgresql
sudo -u postgres createuser --createdb $(whoami)
sudo -u postgres createuser hexlet_sicp_test_user
sudo -u postgres psql -c "ALTER USER hexlet_sicp_test_user WITH ENCRYPTED PASSWORD 'secret'"
createdb hexlet_sicp_test
```
2. Запустить тесты с альтернативным профилем `DB_CONNECTION=pgsql_test make test`

#### Добавить пре-комит хук

```shell
$ git config core.hooksPath .githooks
```

#### Видео созвонов
* [Плейлист созвонов](https://www.youtube.com/playlist?list=PL37_xn2SVZdCJ-xgB-phFaWrp25Kc3cLk)

##
[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript).

## FAQ
Q: Ошибка `Illuminate\Session\TokenMismatchException: CSRF token mismatch.`
A: Сбросить кеш конфига `php artisan config:clear`
