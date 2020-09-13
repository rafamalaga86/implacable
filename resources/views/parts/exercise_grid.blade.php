
@extends('parts.base')

@section('main')
  <div class="container">
    <section class="title small">
      @yield('subtitle')
        <h2 class="text-center">
          @yield('title')
        </h2>
    </section>
  </div>
  <div>
    <section class="grid">
      @yield('cards')
    </section>
  </div>
@endsection

