@php
  $d = $d ?? null; // default value
  $p = $p ?? 'Enter Your ' . $l; // placeholder text
  $r = $r ?? false; // is required or not
  $a = $a ?? false; // is autofocused or not
  $rc = $rc ?? 2; // is rowcount or not
  $dis = $dis ?? false;
  $showcounter = $showcounter ?? false;
  $counter = $counter ?? 100;
  $min = $min ?? false;
  $max = $max ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <textarea @if($min) minlength="{{ $min }}" @endif @if($max) maxlength="{{ $max }}" @endif id="{{ $n }}" rows="{{ $rc }}" @if($showcounter) onkeyup="count_{{ $n }}(this)" @endif class="form-control" name="{{ $n }}" placeholder="{{ $p }}" @if($r) required @endif @if($a) autofocus @endif @if($a) disabled @endif>{{ old($n, $d) }}</textarea>
    @if ($showcounter)
      <p class="mb-0 text-right"><span id="{{ $n }}_counter">0</span> / {{ $counter }}</p>
    @endif
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
  </div>
</div>

@if ($showcounter)
  @push('scripts')
    <script>
      function count_{{ $n }} (el) {
        var txt = el.value;
        $('#{{ $n }}_counter').text(txt.replace(/\s/g, '').length);
      }
    </script>
  @endpush
@endif
