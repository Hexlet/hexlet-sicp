@extends('layouts.land')
@section('content')
<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-12 col-lg-7">
                <h1 class="">СИКП — книга об информатике (computer science)</h1>
                <blockquote class="text-secondary mb-1">Это одна из великих классиков информатики. Я купил свой первый экземпляр 15 лет назад и до сих пор не чувствую, что выучил все, чему должна научить книга.</blockquote>
                <p class="text-secondary font-italic mb-3 mb-lg-5">Пол Грэм</p>
                <p class="h4 text-secondary">Хочешь прокачаться в computer science?</p>
                <p class="h4 text-secondary">Проходи упражнения из книги на sicp.hexlet.io и отмечай свой прогресс.</p>
                <h2 class="h4 mt-3 mt-lg-5">sicp.hexlet.io — это:</h4>
                <div class="row no-gutters my-2 ml-lg-n5 ml-md-n3">
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countChapters }}
                        </div>
                        <div class="text-secondary">
                            разделов
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countExercises }}
                        </div>
                        <div class="text-secondary">
                            упражнений
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countUsers }}
                        </div>
                        <div class="text-secondary">
                            участников
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countComments }}
                        </div>
                        <div class="text-secondary">
                            комментариев
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 card shadow-lg p-2 p-lg-4">
                <h2>Возможности</h4>
                <ul class="text-secondary">
                    <li>Отмечай прочитанные главы</li>
                    <li>Смотри рейтинг других участников</li>
                    <li>Обсуждай главы и задачи</li>
                    <li>Отмечай пройденные упражнения</li>
                </ul>
                <a class="btn btn-primary btn-lg btn-block mb-4" href="{{ route('register') }}">Начать учиться</a>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-12 col-md text-center">
                <i class="fas fa-book-reader fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    читай
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-laptop-code fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    решай
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-pen-alt fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    общайся
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-award fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    стань лучшим
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
