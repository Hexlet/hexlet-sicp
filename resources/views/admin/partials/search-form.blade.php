<div class="mb-4">
    <div class="card-body">
        <form method="GET" action="{{ $action }}">
            <div class="row g-3">
                <div class="col-md-5">
                    <input type="text"
                           class="form-control"
                           name="filter[name]"
                           placeholder="{{ __('admin.filter.user_name') }}"
                           value="{{ request('filter.name') }}">
                </div>
                <div class="col-md-5">
                    <input type="text"
                           class="form-control"
                           name="filter[email]"
                           placeholder="{{ __('admin.filter.user_email') }}"
                           value="{{ request('filter.email') }}">
                </div>
                <div class="col-md-2">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <i class="bi bi-search"></i>
                        </button>
                        <a href="{{ $action }}" class="btn btn-outline-secondary flex-fill">
                            <i class="bi bi-x-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
