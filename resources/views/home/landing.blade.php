<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hexlet SICP</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: Onest, sans-serif;
        }
    </style>
</head>

<body >
<header class="navbar navbar-expand-lg">
    <nav class="container py-2 border-bottom">
        <a href="#" class="navbar-brand"><img src="./logo-02.png" height="40px" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-responsive" aria-controls="navbar-responsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbar-responsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link p-2">Оглавление</a></li>
                <li class="nav-item"><a href="#" class="nav-link p-2">Упражнения</a></li>
                <li class="nav-item"><a href="#" class="nav-link p-2">Как изучать</a></li>
                <li class="nav-item"><a href="#" class="nav-link p-2">Рейтинг</a></li>
                <li class="nav-item"><a href="#" class="nav-link link-info p-2">Книга</a></li>
            </ul>
            <ul class="navbar-nav ms-md-auto">
                @if(app()->environment('local'))
                    <li>
                        <a href="{{ route('auth.dev-login') }}" class="nav-link px-2" data-method="post" data-confirm="Are you sure you want to submit?"> Dev-login</a>
                    </li>
                @endif
                <li class="nav-item"><a href="#" class="nav-link p-2">Вход</a></li>
                <li class="nav-item"><a href="#" class="nav-link p-2">Регистрация</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle p-2" id="dropdownFlagButton" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" href="#">
                        <img src="https://sicp.hexlet.io/icons/flags/ru.svg" alt="Русский" class="mr-1" width="24">
                        <span class="d-md-none">Русский</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right x-min-w-0" aria-labelledby="dropdownFlagButton">
                        <li>
                            <a href="https://sicp.hexlet.io" rel="alternate" class="dropdown-item" hreflang="en">
                                <img src="https://sicp.hexlet.io/icons/flags/en.svg" alt="English" class="mr-1" width="24">
                                <span class="d-md-none">English</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>
    <section class="container my-5">
        <div class="row align-items-center">
            <div class="col col-md-6">
                <h1 class="fw-bold mb-5 text-uppercase">СИКП — книга об информатике <br> <span class="text-primary">(computer science)</span></h1>
                <figure>
                    <blockquote class="blockquote">
                        <p class="small">Я отказался от С++ сервера, написанного в прошлом году, ради нового, на Racket. Он может и не масштабируется, но выигрывает для разработки, даже новичком.</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Джон Кармак</cite>
                    </figcaption>
                </figure>
                <figure>
                    <blockquote class="blockquote">
                        <p class="small">Хотел бы я прочитать СИКП, когда учился в старшей школе!</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Джон Кармак</cite>
                    </figcaption>
                </figure>
            </div>
            <div class="d-none d-md-block col-md-6 text-center">
                <img src="https://sicp.hexlet.io/img/Patchouli_Gives_SICP.png?id=ec5cb83d8b7d6e7b270c" alt="" class="img-fluid">
            </div>
        </div>
        <div class="row my-5">
            <div class="col-6 col-lg-3 text-center">
                <i class="bi bi-book fs-1 text-primary"></i>
                <p class="h2">читай</p>
            </div>
            <div class="col-6 col-lg-3 text-center">
                <i class="bi bi-code-square fs-1 text-primary"></i>
                <p class="h2">решай</p>
            </div>
            <div class="col-6 col-lg-3 text-center">
                <i class="bi bi-pen fs-1 text-primary"></i>
                <p class="h2">общайся</p>
            </div>
            <div class="col-6 col-lg-3 text-center">
                <i class="bi bi-award fs-1 text-primary"></i>
                <p class="h2">стань лучшим</p>
            </div>
        </div>
    </section>
    <div class="bg-light py-3 py-md-5">
        <section class="container my-3 my-md-5">
            <div class="row">
                <div class="col col-lg-7">
                    <h2 class="fw-bold text-uppercase">Хочешь прокачаться в computer science?</h2>
                    <p class="lead">Проходи упражнения из книги на Hexlet SICP и отмечай свой прогресс</p>
                    <h3 class="mt-5">Hexlet SICP — это</h3>
                    <div class="row row-cols-2 row-cols-lg-4 mb-5 mb-lg-0">
                        <div class="col">
                            <span class="h3 text-primary">129</span>
                            <div>разделов</div>
                        </div>
                        <div class="col">
                            <span class="h3 text-primary">356</span>
                            <div>упражнений</div>
                        </div>
                        <div class="col">
                            <span class="h3 text-primary">5635</span>
                            <div>участников</div>
                        </div>
                        <div class="col">
                            <span class="h3 text-primary">14</span>
                            <div>комментариев</div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-5">
                    <div class="border-0 card d-flex h-100 ps-3 shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <h2 class="card-title">Возможности</h2>
                            <ul class="card-text">
                                <li>Отмечай прочитанные главы</li>
                                <li>Смотри рейтинг других участников</li>
                                <li>Обсуждай главы и задачи</li>
                                <li>Отмечай пройденные упражнения</li>
                            </ul>
                            <a href="#" class="btn btn-primary py-3">Начать учиться</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer>
        <div class="container">
            <div class="row gap-4 gap-lg-0 row-cols-1 row-cols-lg-4 py-5">
                <div class="col">
                    <ul class="nav flex-column align-items-start">
                        <li><a href="#" class="nav-link px-0">О проекте</a></li>
                        <li><a href="#" class="nav-link px-0">Исходный код</a></li>
                        <li><a href="#" class="nav-link px-0">Slack #hexlet-volunteers</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="fw-bold">Помощь</div>
                    <ul class="nav flex-column align-items-start">
                        <li><a href="#" class="nav-link px-0">Блог</a></li>
                        <li><a href="#" class="nav-link px-0">База знаний</a></li>
                        <li><a href="#" class="nav-link px-0">Рекомендуемые книги</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="fw-bold">OpenSource</div>
                    <ul class="nav flex-column align-items-start">
                        <li><a href="#" class="nav-link px-0">Хекслет-резюме</a></li>
                        <li><a href="#" class="nav-link px-0">Хекслет-редактор</a></li>
                        <li><a href="#" class="nav-link px-0">Друзья Хекслета</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="fw-bold">Дополнительно</div>
                    <ul class="nav flex-column align-items-start">
                        <li><a href="#" class="nav-link px-0">Code Basics</a></li>
                        <li><a href="#" class="nav-link px-0">Кодбаттл</a></li>
                        <li><a href="#" class="nav-link px-0">Гайды Хекслета</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</main>
</body>

</html>
