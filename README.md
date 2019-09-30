[![Maintainability](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/maintainability)](https://codeclimate.com/github/Hexlet/hexlet-sicp/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/117a4957bde29b93eb7b/test_coverage)](https://codeclimate.com/github/Hexlet/hexlet-sicp/test_coverage)
[![build status](https://travis-ci.org/Hexlet/hexlet-sicp.svg?branch=master)](https://travis-ci.com/Hexlet/hexlet-sicp)

# hexlet-sicp

Осилятор СИКП &mdash; сервис, в котором есть рейтинг тех, кто проходит сикп, и каждый отмечает что он прошел.

### Участие

* Обсуждение в канале #hexlet-volunteers слака http://slack-ru.hexlet.io

### Requirements

* PHP
* Composer

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
* Формы делаются с помощью https://github.com/LaravelCollective/html
* В подавляющем большинстве используется ресурсный роутинг. Что под него не подходит сначала обсуждается (такое бывает крайне редко)
* Тексты только через локали

#### Видео созвонов
* 07.09.2019 https://youtu.be/82QPDHVUIc0

##
[![Hexlet Ltd. logo](https://raw.githubusercontent.com/Hexlet/hexletguides.github.io/master/images/hexlet_logo128.png)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript)

This repository is created and maintained by the team and the community of Hexlet, an educational project. [Read more about Hexlet (in Russian)](https://ru.hexlet.io/pages/about?utm_source=github&utm_medium=link&utm_campaign=exercises-javascript).
##
