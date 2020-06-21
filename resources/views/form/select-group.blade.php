@php
  $d = $d ?? null; // default value
  $r = $r ?? false; // is required or not
  $a = $a ?? false; // is autofocused or not
  $s = $s ?? 'name';
  $m = $m ?? false;
  $dis = $dis ?? false;
  $vModel = $vModel ?? false;
@endphp

<div class="form-group row">
  <label for="{{ $n }}" class="col-sm-4 col-form-label text-md-right"><b>{{ $l }}@if($r)*@endif</b></label>
  <div class="col-md-8">
    <select @if($vModel) v-model="{{ $vModel }}" @endif id="{{ $n }}" class="form-control" name="{{ $n }}" @if($r) required @endif @if($m) multiple @endif @if($a) autofocus @endif @if($dis) disabled @endif>
      <option value="">-- SELECT --</option>
      @foreach($i as $item)
        <optgroup label="{{ $item[$s] }}">
          @foreach($item[$g] as $subItem)
            @if($subItem['id'] == old($n, $d))
              <option value="{{ $subItem['id'] }}" selected>{{ $subItem[$s] }}</option>
            @else
              <option value="{{ $subItem['id'] }}">{{ $subItem[$s] }}</option>
            @endif
          @endforeach
        </optgroup>
      @endforeach
    </select>
    @if ($errors->has($n))
      <small class="text-danger">{{ $errors->first($n) }}</small>
    @endif
  </div>
</div>
