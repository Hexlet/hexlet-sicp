<div class="mb-3 form-check">
  {{ html()->checkbox($name)->class('form-check-input') }}
  {{ html()->label(__($label))->for($name)->class('form-label') }}
</div>
