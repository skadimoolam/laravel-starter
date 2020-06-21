@php
  $t = $t ?? 'text'; // type of input
  $d = $d ?? null; // default value
  $l = $l ?? ''; // placeholder text
  $p = $p ?? 'Enter Your ' . $l; // placeholder text
  $r = $r ?? false; // is required or not
  $a = $a ?? false; // is autofocused or not
  $dis = $dis ?? false; // is disables
  $xModel = $xModel ?? false; // no xModel
@endphp

<div class="form-group row">
  <label for="{{ $n }}" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <input id="{{ $n }}" type="{{ $t }}" class="form-control" name="{{ $n }}" value="{{ old($n, $d) }}" placeholder="{{ $p }}" @if($xModel) x-model="{{ $xModel }}" @endif @if($r) required @endif @if($a) autofocus @endif @if($dis) disabled @endif>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
  </div>
</div>
