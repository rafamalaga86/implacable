
@extends('parts.exercise_grid')

@section('title', 'Exercises Library (' . $exercises->count() . ')')

@section('cards')
      @forelse ($exercises as $exercise)
        <div class="card card-{{ $exercise->id }}" data-exercise-id="{{ $exercise->id }}" data-exercise-name="{{ $exercise->name }}">
          <img class="card-imgCover" src="{{ image_repo_asset($exercise->image_name) }}" alt="{{ $exercise->name }}">
          <div class="card-imgOverlay card-button-bar">
            @include('parts/card-button-bar')
          </div>
          <div class="card-content">
            <div class="card-gameTitle alone">
              <a><span>{{ $exercise->name }}</span></a>
            </div>
          </div>

          <div class="card-scores d-flex">
          </div>

        </div>
      @empty
        <div class="container">
          <span>Sorry, we did not find any exercise. :)</span>
        </div>
      @endforelse
@endsection


