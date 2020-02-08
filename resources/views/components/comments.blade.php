@if($model->comments->isEmpty())
    <p>
        @lang('comment.none_comments')
    </p>
@endif

<ul class="list-unstyled">
@foreach($model->comments as $comment)
    @include('components.comment._comment', ['comment' => $comment])
@endforeach
</ul>

@auth
    @include('components.comment._form')
@else
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">@lang('comment.authentication_required')</h5>
            <p class="card-text">@lang('comment.must_log_in')</p>
            <a href="{{ route('login') }}" class="btn btn-primary">@lang('layout.nav.login')</a>
        </div>
    </div>
@endauth
