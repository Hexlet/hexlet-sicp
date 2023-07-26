@foreach (session('flash_notification', collect())->toArray() as $message)
  @if ($message['overlay'])
    @include('vendor.flash.modal', [
        'modalClass' => 'flash-modal',
        'title' => $message['title'],
        'body' => $message['message'],
    ])
  @else
    <div
      class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important fade show' : '' }}"
      role="alert">
      {!! $message['message'] !!}
      @if ($message['important'])
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      @endif
    </div>
  @endif
@endforeach

{{ session()->forget('flash_notification') }}
