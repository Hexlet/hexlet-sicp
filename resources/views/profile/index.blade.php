@extends('layout.app')

@section('content')
    <div class="row my-4">
        <div class="col-12 col-md-3">
            <div class="position-sticky sticky-top pt-4 mb-4">
                <img class="img-fluid rounded shadow-sm mb-3" src="{{ $user->photo }}">
                <h1 class="h2 mb-2">
                    {{ $user->name }}
                </h1>
                <div class="small mt-5">
                    <a title="#" class="text-muted" href="#">Редактировать профиль</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9 my-4 d-flex flex-column">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"><a class="nav-link px-3 active" href="#">Прогресс</a></li>
            </ul>

            <div class="tab-content py-4">
                <div aria-labelledby="stats-tab" class="tab-pane fade show active" id="stats" role="tabpanel">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur consequatur dignissimos eos id molestiae officia perferendis quibusdam, quo reiciendis voluptatem! Dolor nemo numquam officiis quasi, repellat unde vero! Culpa, itaque?
                </div>

            </div>

        </div>
    </div>
@endsection
