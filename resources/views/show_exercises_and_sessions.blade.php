
@extends('parts.exercise_grid')

@section('title', 'Your Exercises')

@section('subtitle')
      @if (!Auth::user() && !$exercises->isEmpty())
        <p class="subtitle">You are seeing the data of user <em>{{ $exercises[0]->getSessionsByUser($user, 10)[0]->user->name }}</em></p>
      @endif
@endsection

@section('cards')
      @forelse ($exercises as $exercise)
        <div class="card card-{{ $exercise->id }}" data-exercise-id="{{ $exercise->id }}" data-exercise-name="{{ $exercise->name }}" data-last-sets="{{ $exercise->getSessionsByUser($user, 10) ? $exercise->getSessionsByUser($user, 10)[0]->sets : '' }}" data-last-reps="{{ $exercise->getSessionsByUser($user, 10) ? $exercise->getSessionsByUser($user, 10)[0]->reps : '' }}" data-last-weight="{{ $exercise->getSessionsByUser($user, 10) ? $exercise->getSessionsByUser($user, 10)[0]->weight : '' }}" data-last-level="{{ $exercise->getSessionsByUser($user, 10) ? $exercise->getSessionsByUser($user, 10)[0]->level : '' }}">
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
            @if (isset($user) && $exercise->getSessionsByUser($user, 10))
              <div class="score-hltb_length full">
                @foreach ($exercise->getSessionsByUser($user, 10) as $session)
                  <p class="{{ \Carbon\Carbon::today()->eq($session->date) ? 'bg-orange' : '' }}">
                    {{ $session->sets }} x {{ $session->reps }} <span class="smaller">reps</span>
                    @if ($session->weight)
                      <span class="smaller">with</span> {{ $session->weight }} <span class="smaller">Kg</span>
                    @endif
                    @if ($session->level)
                      <span class="smaller">at level</span> {{ $session->level }}
                    @endif
                  </p>
                @endforeach
              </div>
            @endif
          </div>

        </div>
      @empty
        <div class="container">
          <span>Sorry, we did not find exercise. :)</span>
        </div>
      @endforelse
@endsection


