<div class="mb-3">
  {{ html()->label(__($label))->for($name)->class('form-label') }}
  {{ html()->password($name)->class(['form-control', 'is-invalid' => $errors->has($name)]) }}
  @error($name)
  <span class="invalid-feedback">{{ $errors->first($name) }}</span>
  @enderror
</div>
