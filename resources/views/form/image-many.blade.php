@php
  $w = $w ?? '250';
  $h = $h ?? '100%';
  $r = $r ?? false;
  $help = $help ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}_image" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <input id="{{ $n }}_image" onchange="readURL(this, '#{{ $n }}_image_preview', '#{{ $n }}_image_preview_row');" type="file" accept="image/*" class="form-control" name="{{ $n }}_image[]" @if($r) required @endif multiple>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
    @if ($help)
      <small class="text-dark">{{ $help }}</small>
    @endif
  </div>
</div>

<div id="{{ $n }}_image_preview_row">
  <div class="col-md-8 offset-md-4" id="{{ $n }}_image_preview"></div>
</div>

@push('scripts')
  <script>
    function readURL(input, preview_id, preview_row_id) {
      if (input.files && input.files[0]) {
        $(preview_id).text(''); // delete current images

        for (var i = 0; i < input.files.length; i++) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $(preview_id).append('<img src="'+ e.target.result +'" class="rounded mb-3" width="{{ $w }}" height="{{ $h }}"/>');
          }

          reader.readAsDataURL(input.files[i]);
        }
      }
    }
  </script>
@endpush
