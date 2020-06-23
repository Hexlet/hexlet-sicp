@php
/**
 * @var \Illuminate\Database\Eloquent\Model $model
 * @var \App\Comment $comment
 */
@endphp
<div class="mt-2">
    <span class="h4 mt-2 mb-0 position-relative">{{ __('solution.title') }}</span>
    @auth
        @include('components.solution._form')
    @else
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ __('comment.authentication_required') }}</h5>
                <p class="card-text">{{ __('comment.must_log_in') }}</p>
                <a href="{{ route('login') }}" class="btn btn-primary">{{ __('layout.nav.login') }}</a>
            </div>
        </div>
    @endauth
</div>