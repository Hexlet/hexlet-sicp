@extends('layouts.land_new')
@section('content')

    <main role="main">

        <div id="myCarousel" class="carousel slide mb-5" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active bg-secondary"></li>
                <li data-target="#myCarousel" data-slide-to="1" class="bg-secondary"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="carousel-caption text-left row text-secondary ">

                            <div class="col-md-6 mt-5">
                                <h1>{{ __('landing.title') }}</h1>
                                <blockquote class="mb-1">{{ __('landing.epigraph') }}</blockquote>
                                <p class="font-italic mb-3 mb-lg-5">{{ __('landing.author_of_epigraph') }}</p>
                            </div>
                            <div class="col-md-6 d-none d-sm-block">
                                <img class="img-fluid" src="{{ asset('img/Patchouli_Gives_SICP.png') }}"
                                     alt="Начать изучать sicp">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="carousel-caption text-left row text-secondary align-top">

                            <div class="col-md-6 d-sm-none d-md-block mt-5 ">
                                <div class="h1">{{ __('landing.what_for') }}</div>
                                <p class="h4">{{ __('landing.what_do') }}</p>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container ">

            <div class="row">
                <div class="col-md-6">
                    <h2>sicp.hexlet.io — {{ __('landing.this_is') }}:</h2>
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
                <div class="col-md-6">


                    <h2>{{ __('landing.features') }}</h2>
                    <ul class="h4">
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
            </div><!-- /.row -->
        </div><!-- /.container -->


    </main>
@endsection
