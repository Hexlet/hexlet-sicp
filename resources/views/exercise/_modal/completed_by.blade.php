<div class="modal fade" id="modal-completed-by" tabindex="-1" role="dialog"
     aria-labelledby="completed-by-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"
                    id="completed-by-title">{{ __('exercise.show.completed_by') }}</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="{{ __('layout.common.close') }}">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($exercise->users as $user)
                        <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary"
                        data-bs-dismiss="modal">{{ __('layout.common.close') }}</button>
            </div>
        </div>
    </div>
</div>
