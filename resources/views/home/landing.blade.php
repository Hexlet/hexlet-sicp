@extends('layouts.landing')
@section('content')

    <main>

        <div id="sicpCarousel" class="carousel slide mb-3" data-ride="carousel" data-speed="7000">
            <div class="carousel-inner">
                <div class="sicp-carousel-item carousel-item active">
                    <div class="container">
                        <div class="sicp-carousel-caption text-left text-secondary">
                            <div class="float-lg-right w-25 d-none d-sm-block">
                                <img class="img-fluid"
                                     src="{{ mix('img/Patchouli_Gives_SICP.png') }}"
                                     alt="{{ __('landing.start_learning') }}">
                            </div>
                            <div>
                                <h1>{{ __('landing.title') }}</h1>
                                <blockquote class="mb-1">{{ __('landing.epigraph.0') }}</blockquote>
                                <p class="font-italic mb-3 mb-lg-5">{{ __('landing.author_of_epigraph.0') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sicp-carousel-item carousel-item">
                    <div class="container">
                        <div class="sicp-carousel-caption text-left text-secondary">
                            <div class="w-75">
                                <blockquote class="mb-1">{{ __('landing.epigraph.1') }}</blockquote>
                                <p class="font-italic mb-3 mb-lg-5">{{ __('landing.author_of_epigraph.1') }}</p>
                                <blockquote class="mb-1">{{ __('landing.epigraph.2') }}</blockquote>
                                <p class="font-italic mb-3 mb-lg-5">{{ __('landing.author_of_epigraph.2') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#sicpCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('pagination.previous') }}</span>
            </a>
            <a class="carousel-control-next" href="#sicpCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">{{ __('pagination.next') }}</span>
            </a>
        </div>

        <div class="container ">

            <div class="row">
                <div class="col-md-7">
                    <div class="h4 text-secondary">{{ __('landing.what_for') }}</div>
                    <p class="h4 text-secondary">{{ __('landing.what_do') }}</p>
                    <h2 class="h4 mt-3 mt-lg-5">sicp.hexlet.io — {{ __('landing.this_is') }}:</h2>
                    <div class="row no-gutters my-2 ml-lg-n5 ml-md-n3">
                        <div class="col-6 col-md text-center my-2">
                            <div class="h2 text-primary">
                                {{ $countChapters }}
                            </div>
                            <div class="">
                                {{ __('landing.content.1') }}
                            </div>
                        </div>
                        <div class="col-6 col-md text-center my-2">
                            <div class="h2 text-primary">
                                {{ $countExercises }}
                            </div>
                            <div class="">
                                {{ __('landing.content.2') }}
                            </div>
                        </div>
                        <div class="col-6 col-md text-center my-2">
                            <div class="h2 text-primary">
                                {{ $countUsers }}
                            </div>
                            <div class="">
                                {{ trans_choice('landing.content.3', $countUsers) }}
                            </div>
                        </div>
                        <div class="col-6 col-md text-center my-2">
                            <div class="h2 text-primary">
                                {{ $countComments }}
                            </div>
                            <div class="">
                                {{ trans_choice('landing.content.4', $countComments) }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 card shadow-lg p-2 p-lg-4">


                    <h2>{{ __('landing.features') }}</h2>
                    <ul class="text-secondary">
                        <li>{{ __('landing.features_list.1') }}</li>
                        <li>{{ __('landing.features_list.2') }}</li>
                        <li>{{ __('landing.features_list.3') }}</li>
                        <li>{{ __('landing.features_list.4') }}</li>
                    </ul>
                    <a class="btn btn-primary btn-lg mt-4"
                       href="{{ route('register') }}">{{ __('landing.start_learning') }}</a>
                </div>
            </div>

            <hr class="mt-5 mb-5">

            <div class="row mb-4">
                <div class="col-lg-3 text-center">
                    <i class="fas fa-book-reader fa-7x"></i>
                    <h2>{{ __('landing.actions_list.1') }}</h2>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fas fa-laptop-code fa-7x"></i>
                    <h2>{{ __('landing.actions_list.2') }}</h2>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fas fa-pen-alt fa-7x"></i>
                    <h2>{{ __('landing.actions_list.3') }}</h2>
                </div>
                <div class="col-lg-3 text-center">
                    <i class="fas fa-award fa-7x"></i>
                    <h2>{{ __('landing.actions_list.4') }}</h2>
                </div>
            </div>
        </div>


    </main>
@endsection
