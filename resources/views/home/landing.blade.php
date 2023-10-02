@extends('layouts.app')
@section('landing_content')
  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-7">
          <h2 class="fw-bold text-uppercase">{{ __('landing.what_for') }}</h2>
          <p class="lead">{{ __('landing.what_do') }}</p>
          <h3 class="mt-5">{{ __('landing.this_is') }}</h3>
          <div class="row row-cols-2 row-cols-lg-4 mb-5 mb-lg-0 gy-3">
            <div class="col">
              <span class="h3 text-primary">{{ $countChapters }}</span>
              <div>{{ __('landing.content.1') }}</div>
            </div>
            <div class="col">
              <span class="h3 text-primary">{{ $countExercises }}</span>
              <div>{{ __('landing.content.2') }}</div>
            </div>
            <div class="col">
              <span class="h3 text-primary">{{ $countUsers }}</span>
              <div>{{ trans_choice('landing.content.3', $countUsers) }}</div>
            </div>
            <div class="col">
              <span class="h3 text-primary">{{ $countComments }}</span>
              <div>{{ trans_choice('landing.content.4', $countComments) }}</div>
            </div>
          </div>
        </div>
        <div class="col-md-11 col-lg-5 p-0">
          <div class="border-0 card d-flex h-100 ps-3 pe-3">
            <div class="card-body d-flex flex-column justify-content-center p-0">
              <h2 class="card-title">{{ __('landing.features') }}</h2>
              <ul class="card-text">
                <li>{{ __('landing.features_list.1') }}</li>
                <li>{{ __('landing.features_list.2') }}</li>
                <li>{{ __('landing.features_list.3') }}</li>
                <li>{{ __('landing.features_list.4') }}</li>
              </ul>
              <a href="{{ route('register') }}" class="btn btn-primary btn-lg py-3">
                {{ __('landing.start_learning') }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5 bg-dark text-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col col-md-6">
          <h1 class="fw-bold mb-5 text-uppercase">{{ __('landing.title.1') }}
            <span class="text-primary">{{ __('landing.title.2') }}</span>
          </h1>
          <figure>
            <blockquote class="blockquote">
              <p class="small">{{ __('landing.epigraph.0') }}</p>
            </blockquote>
            <figcaption class="blockquote-footer">
              {{ __('landing.author_of_epigraph.0') }}</cite>
            </figcaption>
          </figure>
          <figure>
            <blockquote class="blockquote">
              <p class="small">{{ __('landing.epigraph.1') }}</p>
            </blockquote>
            <figcaption class="blockquote-footer">
              {{ __('landing.author_of_epigraph.1') }}</cite>
            </figcaption>
          </figure>
        </div>
        <div class="d-none d-md-block col-md-6 text-center">
          <img src="{{ mix('images/Patchouli_Gives_SICP.png') }}" alt="{{ __('landing.start_learning') }}"
            class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <section class="mb-5">
    <div class="container px-1">
      <div class="row d-flex justify-content-center gx-2 gy-3">
        <div class="col-6 col-md-3 text-center">
          <i class="bi bi-book fs-1 text-primary"></i>
          <p class="h2">{{ __('landing.actions_list.1') }}</p>
        </div>
        <div class="col-6 col-md-3 text-center">
          <i class="bi bi-code-square fs-1 text-primary"></i>
          <p class="h2">{{ __('landing.actions_list.2') }}</p>
        </div>

        <div class="col-6 col-md-3 text-center">
          <i class="bi bi-pen fs-1 text-primary"></i>
          <p class="h2">{{ __('landing.actions_list.3') }}</p>
        </div>
        <div class="col-6 col-md-3 text-center">
          <i class="bi bi-award fs-1 text-primary"></i>
          <p class="h2">{{ __('landing.actions_list.4') }}</p>
        </div>
      </div>

    </div>

  </section>
@endsection
