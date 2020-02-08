<div id="comment-{{ $comment->id }}" class="media">
    <div class="mr-3"></div>
    <div class="media-body">
        <h5 class="mt-0 mb-1">
            <a href="#comment-{{ $comment->id }}">#</a>
            {{ $comment->user->name }} <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
        <div style="white-space: pre-wrap;">{!! $comment->content !!}</div>
        <div>
            @can('reply', $comment)
                <button data-toggle="modal"
                        data-target="#reply-modal-{{ $comment->id }}"
                        class="btn btn-sm btn-link text-uppercase">
                    @lang('comment.reply')
                </button>
            @endcan
            @can('update', $comment)
                <button data-toggle="modal"
                        data-target="#comment-modal-{{ $comment->id }}"
                        class="btn btn-sm btn-link text-uppercase">
                    @lang('comment.edit')
                </button>
            @endcan
            @can('delete', $comment)
                <a href="{{ route('comments.destroy', $comment) }}"
                   onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();"
                   class="btn btn-sm btn-link text-danger text-uppercase">
                    @lang('comment.delete')
                </a>
                <form id="comment-delete-form-{{ $comment->id }}"
                      action="{{ url('comments/' . $comment->id) }}"
                      method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
        </div>
        {{--        @todo убрать дублирование, вынести в компонент форму --}}
        @can('update', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('comment.edit_comment') }}</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="content">{{ __('comment.update_comment_here') }}</label>
                                    <textarea required class="form-control" name="content" rows="3">{{ $comment->content }}</textarea>
{{--                                    <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">{{ __('comment.update') }}</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">{{ __('comment.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan

        @can('create', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('comments/' . $comment->id) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('comment.reply_to_comment') }}</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="content">{{ __('comment.enter_your_message') }}</label>
                                    <textarea required class="form-control" name="content" rows="3"></textarea>
{{--                                    <small class="form-text text-muted"><a target="_blank" href="https://help.github.com/articles/basic-writing-and-formatting-syntax">Markdown</a> cheatsheet.</small>--}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">{{ __('comment.reply') }}</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">{{ __('comment.cancel') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endcan
        <br />{{-- Margin bottom --}}
    </div>
</div>
