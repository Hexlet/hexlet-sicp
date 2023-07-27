<div class="col-md-3 mb-2">
  <div class="card shadow-sm">
    <div class="card-header font-weight-bold text-muted">
      {{ __('account.settings') }}
    </div>
    <div class="list-group list-group-flush">
      <a class="nav-link list-group-item list-group-item-action {{ Request::routeIs('settings.profile.index') ? 'active' : '' }}"
        href="{{ route('settings.profile.index') }}">
        {{ __('account.profile') }}
      </a>
    </div>
    <div class="list-group list-group-flush">
      <a class="nav-link list-group-item list-group-item-action {{ Request::routeIs('settings.account.index') ? 'active' : '' }}"
        href="{{ route('settings.account.index') }}">
        {{ __('account.account') }}
      </a>
    </div>
  </div>
</div>
