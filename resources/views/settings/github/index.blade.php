@php use App\Enums\GithubRepositoryStatus;use App\Models\GitHubRepository;use App\Models\User; @endphp
@extends('layouts.app')
@php
  /**
   * @var User $user
   * @var GitHubRepository|null $repository
   */
@endphp
@section('content')
  <div class="row my-4">
    @include('settings._menu')
    <div class="col-12 col-md-9">

      <div class="card mb-3">
        <div class="card-body">
          <h3 class="card-title">{{ __('account.github.title') }}</h3>
          <p class="card-text text-muted">
            {{ __('account.github.description') }}
          </p>
        </div>
      </div>

      @if(!$user->github_access_token)
        <div class="card mb-3">
          <div class="card-body">
            <div class="alert alert-warning" role="alert">
              <i class="fas fa-exclamation-triangle"></i>
              {{ __('account.github.not_authorized') }}
            </div>
            <a href="{{ route('oauth.github') }}" class="btn btn-dark">
              <i class="fab fa-github"></i>
              {{ __('account.github.connect_github') }}
            </a>
          </div>
        </div>
      @elseif(!$repository)
        <div class="card mb-3">
          <div class="card-body">
            <div class="alert alert-info" role="alert">
              <i class="fas fa-info-circle"></i>
              {{ __('account.github.not_configured') }}
            </div>
            <p class="card-text">
              {{ __('account.github.setup_description') }}
            </p>
            <form action="{{ route('settings.github.store') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                {{ __('account.github.create_repository') }}
              </button>
            </form>
          </div>
        </div>
      @else
        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title">{{ __('account.github.repository_status') }}</h4>

            <div class="mb-3">
              <strong>{{ __('account.github.status') }}:</strong>
              @if($repository->status === GithubRepositoryStatus::Active)
                <span class="badge badge-success">{{ __('account.github.status_active') }}</span>
              @elseif($repository->status === GithubRepositoryStatus::Pending)
                <span class="badge badge-warning">{{ __('account.github.status_pending') }}</span>
              @else
                <span class="badge badge-danger">{{ __('account.github.status_error') }}</span>
              @endif
            </div>

            <div class="mb-3">
              <strong>{{ __('account.github.repository_name') }}:</strong>
              <a href="{{ $repository->url }}" target="_blank" rel="noopener noreferrer">
                {{ $repository->full_name }}
                <i class="fas fa-external-link-alt fa-sm"></i>
              </a>
            </div>

            @if($repository->last_sync_at)
              <div class="mb-3">
                <strong>{{ __('account.github.last_sync') }}:</strong>
                {{ $repository->last_sync_at->diffForHumans() }}
              </div>
            @endif

            @if($repository->last_error)
              <div class="alert alert-danger" role="alert">
                <strong>{{ __('account.github.last_error') }}:</strong>
                {{ $repository->last_error }}
              </div>
            @endif
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title">{{ __('account.github.actions') }}</h4>

            <form action="{{ route('settings.github.sync') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-primary mb-2"
                      {{ $repository->status !== GithubRepositoryStatus::Active ? 'disabled' : '' }}>
                <i class="fas fa-sync"></i>
                {{ __('account.github.sync_solutions') }}
              </button>
            </form>

            <form action="{{ route('settings.github.destroy', $repository) }}" method="POST" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger mb-2"
                      data-confirm="{{ __('account.github.confirm_delete') }}">
                <i class="fas fa-trash"></i>
                {{ __('account.github.delete_integration') }}
              </button>
            </form>
          </div>
        </div>

        <div class="card mb-3">
          <div class="card-body">
            <h4 class="card-title">{{ __('account.github.how_it_works') }}</h4>
            <ul class="mb-0">
              <li>{{ __('account.github.instruction_1') }}</li>
              <li>{{ __('account.github.instruction_2') }}</li>
              <li>{{ __('account.github.instruction_3') }}</li>
              <li>{{ __('account.github.instruction_4') }}</li>
            </ul>
          </div>
        </div>
      @endif

    </div>
  </div>
@endsection
