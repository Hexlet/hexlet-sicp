@php
  /**
   * @var \Illuminate\Database\Eloquent\Model $model
   * @var \App\Models\Comment $comment
   */
  use App\Http\Requests\CommentRequest;
  $maxCommentLength = CommentRequest::MAX_CONTENT_LENGTH;
@endphp
<div class="mt-2">
  @if ($model->comments->isEmpty())
    <p>
      {{ __('comment.none_comments') }}
    </p>
  @endif
  <ul class="list-unstyled">
    @foreach ($model->comments as $comment)
      @include('components.comment._comment', ['comment' => $comment, 'maxCommentLength' => $maxCommentLength])
    @endforeach
  </ul>
  @auth
    @include('components.comment._form', ['maxCommentLength' => $maxCommentLength])
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
