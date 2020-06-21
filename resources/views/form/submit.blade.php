@php
  $c = $c ?? false; // Should show a confirm message before submission
@endphp

<div class="row">
  <div class="form-group mx-auto mb-0">
    <button @if($c) onclick="return confirm('Are you sure ?')" @endif type="submit" class="btn btn-primary">{{ $l }}</button>
  </div>
</div>
