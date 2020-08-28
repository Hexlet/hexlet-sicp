@extends('layouts.land')
@section('content')
<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
        <div class="row align-items-lg-center">
            <div class="col-12 col-lg-7">
                <h1>{{ __('landing.title') }}</h1>
                <blockquote class="text-secondary mb-1">{{ __('landing.epigraph') }}</blockquote>
                <p class="text-secondary font-italic mb-3 mb-lg-5">{{ __('landing.author_of_epigraph') }}</p>
                <p class="h4 text-secondary">{{ __('landing.what_for') }}</p>
                <p class="h4 text-secondary">{{ __('landing.what_do') }}</p>
                <h2 class="h4 mt-3 mt-lg-5">sicp.hexlet.io — {{ __('landing.this_is') }}:</h2>
                <div class="row no-gutters my-2 ml-lg-n5 ml-md-n3">
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countChapters }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('landing.content.1', $countChapters) }}
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countExercises }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('landing.content.2', $countExercises) }}
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countUsers }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('landing.content.3', $countUsers) }}
                        </div>
                    </div>
                    <div class="col-6 col-md text-center my-2">
                        <div class="h2 text-primary">
                            {{ $countComments }}
                        </div>
                        <div class="text-secondary">
                            {{ trans_choice('landing.content.4', $countComments) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 card shadow-lg p-2 p-lg-4">
                <h2>{{ __('landing.features') }}</h4>
                <ul class="text-secondary">
                    <li>{{ __('landing.features_list.1') }}</li>
                    <li>{{ __('landing.features_list.2') }}</li>
                    <li>{{ __('landing.features_list.3') }}</li>
                    <li>{{ __('landing.features_list.4') }}</li>
                </ul>
                <a class="btn btn-primary btn-lg btn-block mb-4" href="{{ route('register') }}">{{ __('landing.start_learning') }}</a>
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
                    {{ __('landing.actions_list.1') }}
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-laptop-code fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    {{ __('landing.actions_list.2') }}
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-pen-alt fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    {{ __('landing.actions_list.3') }}
                </div>
            </div>
            <div class="col-12 col-md text-center">
                <i class="fas fa-award fa-7x"></i>
                <div class="h4 text-secondary mt-2">
                    {{ __('landing.actions_list.4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
