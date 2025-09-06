# Hexlet SICP

[![github action status](https://github.com/Hexlet/hexlet-sicp/actions/workflows/master.yml/badge.svg)](https://github.com/Hexlet/hexlet-sicp/actions)

[![codecov](https://codecov.io/gh/Hexlet/hexlet-sicp/branch/master/graph/badge.svg)](https://codecov.io/gh/Hexlet/hexlet-sicp)

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://heroku.com/deploy)

Читать на другом языке: [English](README.md)

Hexlet SICP &mdash; это сервис для тех, кто изучает книгу "Структура и интерпретация компьютерных программ". Отслеживайте свой прогресс и сравнивайте себя с другими в глобальной таблице лидеров.

Предварительно рекомендуем прочесть статью [Как изучать Структуру и Интерпретацию Компьютерных Программ (SICP)](https://guides.hexlet.io/how-to-learn-sicp/)

## Участие в разработке

* Обсуждение идёт в [Telegram Hexlet](https://t.me/hexletcommunity/12) в канале Волонтеры
* [Плейлист записей созвонов участников](https://www.youtube.com/playlist?list=PL37_xn2SVZdCJ-xgB-phFaWrp25Kc3cLk)

## Известные ошибки

Q: Ошибка `Illuminate\Session\TokenMismatchException: CSRF token mismatch.`

A: Сбросить кеш конфига `php artisan config:clear`

## Установка

### Предварительные требования

* PHP ^8.3
* Composer
* Node.js (v16+) & NPM (6+)
* SQLite for local, PostgreSQL for production
* Heroku cli ([_Как развернуть приложение Laravel на Heroku_](https://ru.hexlet.io/blog/posts/kak-razvernut-prilozhenie-laravel-na-heroku))

Проверить зависимости PHP можно командой `composer check-platform-reqs`

Если нет каких-то зависимостей, то их можно установить командой (Ubuntu) `sudo apt install php-EXTENSION`

### Локальная установка

Для запуска на локальном интерпретаторе и SQLite:

```sh
make setup # первоначальная установка
make start # запуск сервера http://127.0.0.1:8000/
make test # запуск тестов
```

### Запуск с БД PostgreSQL (разворачивается в Docker-контейнере)

1. Установить зависимости и подготовить конфигурационный файл

    ```sh
    make setup
    ```

2. Указать параметры подключения к БД в файле *.env*

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=localhost
    DB_PORT=54320
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Запустить контейнер с БД и сгенерировать записи

    ```sh
    make compose-start-database
    make db-prepare
    ```

4. Запустить локальный веб-сервер

    ```sh
    make start
    ```

### Установка в Docker

1. Подготовить файл *.env*

    ```sh
    make env-prepare
    ```

2. Указать параметры подключения к БД в файле *.env*

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=database
    DB_PORT=5432
    DB_DATABASE=postgres
    DB_USERNAME=postgres
    DB_PASSWORD=secret
    ```

3. Собрать и запустить приложение

    ```sh
    make compose-setup # собрать проект
    make compose-start # запустить сервер http://127.0.0.1:8000/
    make compose-bash  # запустить сессию bash в docker-контейнере
    make test          # запустить тесты в docker-контейнере
    ```

## Стандарты кодирования и прочие правила

* Пулреквесты должны быть настолько маленькими, насколько это возможно с точки зрения здравого смысла
* Весь код должен соответствовать стандартам кодирования PSR12 и Laravel (мы так же используем некоторые собственные правила, чтобы усложнить жизнь разработчика)
* Пулреквест должен проходить все проверки CI
* Все экшены контроллеров должны быть покрыты тестами ([_Начинаем писать тесты (правильно)_](https://ru.hexlet.io/blog/posts/how-to-test-code))
* Формы делаются с помощью [laraeast/laravel-bootstrap-forms](https://github.com/laraeast/laravel-bootstrap-forms)
* В подавляющем большинстве используется ресурсный роутинг. Что под него не подходит, сначала обсуждается (такое бывает крайне редко)
* Тексты только через локали
* Чтобы включить логирование Rollbar, необходимо установить переменную `LOG_CHANNEL=rollbar` и `ROLLBAR_TOKEN=` ([_документация_](https://docs.rollbar.com/docs/laravel))
* Чтобы добавить упражнение, необходимо добавить его содержимое (код или картинка) по пути `resources/views/exercise/listing/#_#.blade.php`, а текстовое описание в `resources/lang/{locale}/sicp.php` под ключем `exercises.#.#` на соответствующем языке.
* Для генерации хелперов (для автодополнения) используйте `make ide-helper`
* Изучите список доступных команд `php artisan`!

## Руководство по настройке авторизации через GitHub

Зарегистрируйте приложение на GitHub (подробнее <https://developer.github.com/apps/about-apps/>).

Для этого:

* В меню учетной записи GitHub выберите пункт “Settings”
* В открывшемся окне в панели навигации, справа, выберите “GitHub Apps”, затем нажмите кнопку “New GitHub App”
* В открывшейся форме в поле "GitHub App name" введите название приложения (например, Hexlet-SICP)
* В поле Homepage URL &mdash; адрес ресурса (например, <https://hexlet-sicp.herokuapp.com>)
* В поле "User authorization callback URL" введите полный URL-адрес для перенаправления после того, как пользователь авторизует приложение на GitHub. (например, <https://hexlet-sicp.herokuapp.com/oauth/github/callback>)
* В поле "Webhook URL" укажите URL-адрес, по которому будут отправляться события (например, <https://hexlet-sicp.herokuapp.com/oauth/github/callback>)
* Откройте права на получение информации о e-mail пользователя (User permissions->Email addresses->Read only)
* Сохраните данные регистрации приложения (кнопка "Create GitHub App")
* На открывшейся странице приложения скопируйте Client ID и Client secret
* Cгенерируйте закрытый ключ (кнопка Generate a private key)

В случае деплоя на Heroku, задайте переменные окружения для развернутого приложения.

Для этого:

* Перейдите на вкладку "Settings"
* В настройке "Config Vars" добавьте переменные `GITHUB_CLIENT_ID`, `GITHUB_CLIENT_SECRET` и `GITHUB_URL_REDIRECT` указав для них соответвенно значения Client ID, Client secret и User authorization callback URL
* После чего выпольните сброс кеша конфигурации: `heroku run php artisan config:cache`

### Альтернативный профиль БД для тестирования

1. Создать отдельную тестовую базу postgres. Настройки параметров подключения можно посмотреть в секции `pgsql_test` конфигурации `config/database.php`

    Пример создания тестовой базы "с нуля":

    ```shell
    sudo apt install postgresql
    sudo -u postgres createuser --createdb $(whoami)
    sudo -u postgres createuser hexlet_sicp_test_user
    sudo -u postgres psql -c "ALTER USER hexlet_sicp_test_user WITH ENCRYPTED PASSWORD 'secret'"
    createdb hexlet_sicp_test
    ```

2. Запустить тесты с альтернативным профилем `DB_CONNECTION=pgsql_test make test`

### Добавить пре-комит хук

Для хуков требуется локальный NodeJS

```shell
make setup-git-hooks
```

[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/assets/master/images/hexlet_logo128.png)](https://hexlet.io/?utm_source=github&utm_medium=link&utm_campaign=exercises-sicp)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet](https://hexlet.io/?utm_source=github&utm_medium=link&utm_campaign=exercises-sicp)

See most active contributors on [hexlet-friends](https://friends.hexlet.io/).
 