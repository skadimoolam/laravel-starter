@php
  $w = $w ?? '250';
  $h = $h ?? '100%';
  $r = $r ?? false;
  $help = $help ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}_image" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <input id="{{ $n }}_image" onchange="readURL(this, '#{{ $n }}_image_preview', '#{{ $n }}_image_preview_row');" type="file" accept="image/*" class="form-control" name="{{ $n }}_image" @if($r) required @endif>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
    @if ($help)
      <small class="text-dark">{{ $help }}</small>
    @endif
  </div>
</div>

<div id="{{ $n }}_image_preview_row" class="row mb-3 d-none">
  <div class="col-md-8 offset-md-4">
    <img class="rounded" id="{{ $n }}_image_preview" width="{{ $w }}" height="{{ $h }}">
  </div>
</div>

@push('scripts')
  <script>
    function readURL(input, preview_id, preview_row_id) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $(preview_id).attr('src', e.target.result);
          $(preview_row_id).removeClass("d-none");
        }

        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>
@endpush
