<div class="col-12 col-md-3">
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-muted">
            {{ __('account.settings') }}
        </div>
        <div class="list-group list-group-flush">
            <a class="nav-link list-group-item list-group-item-action {{ isActiveRoute('account.edit')  ? 'active' : ''}}"
               href="{{ route('account.edit', $user) }}">
                {{ __('account.profile') }}
            </a>
        </div>
        <div class="list-group list-group-flush">
            <a class="nav-link list-group-item list-group-item-action {{ isActiveRoute('account.delete')  ? 'active' : '' }}"
               href="{{ route('account.delete', $user) }}">
                {{ __('account.account') }}
            </a>
        </div>
    </div>
</div>
