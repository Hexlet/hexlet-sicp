@extends('layouts.app')
@section('description')
  {{ __('about.description') }}
@endsection
@section('content')
  <h1 class="my-4">О проекте</h1>
  <p>Добро пожаловать в open-source проект Хекслет СИКП!</p>
  <p>Хекслет СИКП — это сервис для тех, кто изучает книгу "Структура и интерпретация компьютерных программ".
    Отслеживайте свой прогресс и соревнуйтесь с другими, повышая свой рейтинг.</p>
  <h4>Возможности сервиса</h4>
  <div>
    <ul>
      <li>Отмечать главы прочитанными</li>
      <li>Смотреть рейтинг, кто сколько прочитал</li>
      <li>Следить за активностью пользователей</li>
      <li>Обсуждать главы и задачки</li>
      <li>Отмечать пройденными упражнения</li>
    </ul>
  </div>
  <h4>От чего зависит рейтинг?</h4>
  <p>Рейтинг зависит от количества прочитанных глав и пройденных упражнений. За каждые пройденные главы и упражнения вы
    получаете баллы, которые повышают ваш рейтинг. Упражнения в рейтинге имеют бОльший вес, практика – превыше всего! :)
  </p>
  <h4>Рекомендации</h4>
  <p><a href="https://guides.hexlet.io/how-to-learn-sicp" target="_blank">Как изучать СИКП?</a></p>
  <p><a href="https://github.com/hexlet-boilerplates/sicp-racket" target="_blank">Репозиторий с настройками Racket для
      прохождения
      СИКП</a></p>
  <p><a href="https://www.youtube.com/watch?v=bFMbqKRjU84&amp;list=PLo6puixMwuSO8eB2uBH5lZy5kjNtdhTfT"
      target="_blank">Видео-курс
      "Структура и интерпретация компьютерных программ"</a></p>
  <p><a href="https://www.youtube.com/playlist?list=PLc6AqfeLgwzPPK1H3XV1Wfb_CGvT6sXkC" target="_blank">Лекции от авторов
      курса</a></p>
  <p><a href="https://github.com/Hexlet/hexlet-sicp" target="_blank">Участвовать в проекте (исходный код)</a></p>
@endsection
