@php
  $w = $w ?? '100%';
  $h = $h ?? '100%';
  $help = $help ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}_image" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <input id="{{ $n }}_image"  type="file" accept="image/*" class="form-control" name="{{ $n }}" @if($r) required @endif>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
    @if ($help)
      <small class="text-dark">{{ $help }}</small>
    @endif
  </div>
</div>

{{-- <div id="{{ $n }}_image_preview_row" class="row mb-3 d-none">
  <div class="col-md-8 offset-md-4">
    <img class="rounded" id="{{ $n }}_image_preview" width="{{ $w }}" height="{{ $h }}">
  </div>
</div> --}}

<div id="{{ $n }}_image_preview_row" class="row d-none"></div>

@push('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.css">
@endpush

@push('scripts')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.js"></script>
  <script>
    var $uploadCrop;

    $(document).on('ready', function () {
      $uploadCrop = $('#{{ $n }}_image_preview_row').croppie({
        viewport: {
          width: 200,
          height: 200,
        },
      });
    })

    function readURL(input, preview_id, preview_row_id) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          console.log(e)
          // $(preview_id).attr('src', e.target.result);
          $(preview_row_id).removeClass("d-none");
          $uploadCrop.croppie('bind', {
            url: e.target.result
          })
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#{{ $n }}_image").change(function() {
      readURL(this, '#{{ $n }}_image_preview', '#{{ $n }}_image_preview_row');
    });
  </script>
@endpush
