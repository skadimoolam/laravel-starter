@php
  $d = $d ?? null; // default value
  $r = $r ?? false; // is required or not
  $a = $a ?? false; // is autofocused or not
  $dis = $dis ?? false;
  $xModel = $xModel ?? false;
  $xChange = $xChange ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <select id="{{ $n }}" class="form-control" name="{{ $n }}" @if($xModel) x-model="{{ $xModel }}" @endif @if($xChange) x-on:change="{{ $xChange }}()" @endif @if($r) required @endif @if($a) autofocus @endif @if($dis) disabled @endif>
      <option value="">-- SELECT --</option>
      @foreach($i as $item)
        @if($item == old($n, $d))
          <option value="{{ $item }}" selected>{{ $item }}</option>
        @else
          <option value="{{ $item }}">{{ $item }}</option>
        @endif
      @endforeach
    </select>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
  </div>
</div>
