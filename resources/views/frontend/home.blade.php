@extends('_layouts.frontend')
@section('title', config('app.name'))
@section('description', '')
@section('content')

  <main class="max-w-5xl mx-auto px-4 text-center">
    <h1 class="text-3xl mt-10">{{ __('app.name') }}</h1>
    <p class="mt-4">Launching Soon...</p>
  </main>

@endsection
