[![Maintainability](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/maintainability)](https://codeclimate.com/github/Hexlet/hexlet-sicp/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/test_coverage)](https://codeclimate.com/github/Hexlet/hexlet-sicp/test_coverage)
[![build status](https://travis-ci.org/Hexlet/hexlet-sicp.svg?branch=master)](https://travis-ci.com/Hexlet/hexlet-sicp)
[![github action status](https://github.com/Hexlet/hexlet-sicp/workflows/Main%20workflow/badge.svg)](https://github.com/Hexlet/hexlet-sicp/actions)
# hexlet-sicp

Осилятор СИКП &mdash; сервис, в котором есть рейтинг тех, кто проходит сикп, и каждый отмечает что он прошел.

### Участие

* Обсуждение в канале #hexlet-volunteers слака http://slack-ru.hexlet.io

### Requirements

* PHP
* Composer
* SQLite for local, PostgreSQL for production
* [heroku cli](https://devcenter.heroku.com/articles/heroku-cli#download-and-install)

### Setup

```sh
$ make setup
$ make test # run tests
$ make start # start server
$ php artisan migrate --seed
```

### Смысл


### MVP

Включает в себя регистрацию и возможность отмечать, что прошел и профиль, в котором это можно посмотреть. Отмечаем по 
* Регистрация по паролю
* Регистрация через соц сети

### Стандарты

* Пулреквесты должны быть настолько маленькими насколько это возможно с точки зрения здравого смысла
* Весь код должен соответствовать стандартам кодирования PSR и Laravel
* Пулреквест должен проходить все проверки

#### Прикладные вещи

* Все экшены контроллеров должны быть покрыты тестами
* Формы делаются с помощью [netojose/laravel-bootstrap-4-forms](https://github.com/netojose/laravel-bootstrap-4-forms)
* В подавляющем большинстве используется ресурсный роутинг. Что под него не подходит сначала обсуждается (такое бывает крайне редко)
* Тексты только через локали
* Чтобы включить логирование Rollbar, необходимо установить переменную `LOG_CHANNEL=rollbar` и `ROLLBAR_TOKEN=`
* Чтобы добавить упражнение необходимо добавить его содержимое (код или картинка) по пути `resources/views/exercise/listing/#_#.blade.php`, а текстовое описание в `resources/lang/{locale}/sicp.php` под ключем `exercises.#.#` на соответствующем языке.

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
* 07.09.2019 https://youtu.be/82QPDHVUIc0

##
[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript).

## FAQ

Q: Ошибка `Illuminate\Session\TokenMismatchException: CSRF token mismatch.`
A: Сбросить кеш конфига `php artisan config:clear`


