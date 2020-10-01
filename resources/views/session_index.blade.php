
@extends('parts.base')

@section('main')
  <div class="container">

    <section class="title">
      <h1 class="text-center">Sesiones de {{ $exercise->name }}</h1>
    </section>

    <section class="row">
      <div class="col-xl-8 mb-30">
        {{-- <div class="played-list data-game-id" data-exercise-id="{{ $exercise->id }}"> --}}

        <table class="table table-striped table-dark">
          <thead>
            <tr>
            <th scope="col">Date</th>
            <th scope="col" class="text-center">Sets</th>
            <th scope="col" class="text-center">Reps</th>
            <th scope="col" class="text-center">Weight</th>
            <th scope="col" class="text-center">Level</th>
            <th scope="col" class="text-center"></th>
            </tr>
          </thead>
          <tbody>
          @foreach ($sessions as $session)
{{--             <div class="mb-30 played" data-id="{{ $session->id }}">
              <div class="form-row">
                    <div class="form-group col-2 col-md-1">
                      <label for="id_username">Sets:</label>
                      <div class="input-group">
                        <input value="{{ $session->sets }}" class="form-control modal-autofocus" type="number" name="sets" id="sets" autofocus="" maxlength="254" required>
                      </div>
                    </div>

                    <div class="form-group col-1 mt-30 text-center">X</div>

                    <div class="col-2 col-md-1 mb-3">
                      <label for="id_username">Reps:</label>
                      <div class="input-group">
                        <input value="{{ $session->reps }}" class="form-control" type="number" name="reps" id="reps" maxlength="254" required>
                      </div>
                    </div>

                    <div class="form-group col-1 mt-30 text-center">with</div>

                    <div class="form-group col-3 col-md-2">
                      <label for="id_username">Weight:</label>
                      <div class="input-group">
                        <input  value="{{ $session->weight }}" class="form-control" type="number" name="weigh maxlength="254" required>
                        <div class="input-group-append">
                          <div class="input-group-text">Kg</div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group col-1 d-md-none mt-30 text-center">at</div>
                    <div class="col-2 col-md-1">
                      <label for="id_username">Level:</label>
                      <div class="input-group">
                        <input value="{{ $session->level }}" class="form-control" type="number" name="level" id="level" maxlength="254" required>
                      </div>
                    </div>

                    <div class="col-8 col-md-3 position-relative mb-0">
                      <label for="id_username">Date:</label>
                      <a href="" class="field-info put-todays-date today absolute"><small>Today</small></a>
                      <input value="{{ $session->date }}" class="form-control get-todays-date" type="date" name="stopped_playing_at">
                    </div>
                    <div class="btn-toolbar mb-0">

                  <div class="btn-group mt-4 col-2">
                    <button class="save-played btn btn-primary">
                      <div class="icon-container">
                        <i class="fa fa-save"></i>
                      </div>
                    </button>

                    <button class="delete-played btn btn-danger">
                      <div class="icon-container">
                        <i class="fa fa-trash"></i>
                        </div>
                    </button>
                  </div>

                </div>
              </div>
            </div>

            <hr>
         --}}
            <tr data-session-id="{{ $session->id }}">
              <td class="date" data-date="{{ $session->date->format('Y-m-d') }}">{{ $session->date->format('d/m/Y') }}</th>
              <td class="text-center sets">{{ $session->sets }}</td>
              <td class="text-center reps">{{ $session->reps }}</td>
              <td class="text-center weight">{{ $session->weight ?? '-' }}</td>
              <td class="text-center level">{{ $session->level ?? '-' }}</td>
              <td class="text-center"><small><a href="#" class="action-modify-modal">Modify</a></small></td>
              <td class="text-center"><small><a href="#" class="action-delete-modal">Delete</a></small></td>
            </tr>
          @endforeach
          </tbody>
          </table>

      </div>

      <div class="col-xl-4 mb-30">
        <figure class="figure-cover mb-30">
          <img src="{{ $exercise->image_url }}" alt="">
        </figure>
      </div>
    </section>

  </div>

        <!-- Modify Session Modal -->
        <div id="modal-modify-session" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h3 class="modal-title w-100">Modify Session</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" data-action="{{ action('SessionController@update', '%session_id%') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                      @csrf
                      {{ method_field('PUT') }}
                      <div class="col-3 mb-3">
                        <label>Sets:</label>
                        <div class="input-group">
                          <input class="form-control modal-autofocus sets" type="number" name="sets" autofocus="" maxlength="254" required>
                        </div>
                      </div>
                      <div class="col-1 mt-30 text-center">X</div>
                      <div class="col-3 mb-3">
                        <label>Reps:</label>
                        <div class="input-group">
                          <input class="form-control reps" type="number" name="reps" autofocus="" maxlength="254" required>
                        </div>
                      </div>
                      <div class="col-5">
                        <label>Weight:</label>
                        <div class="input-group">
                          <input class="form-control weight" type="number" name="weight" autofocus="" maxlength="254">
                          <div class="input-group-append">
                            <div class="input-group-text">Kg</div>
                          </div>
                        </div>
                      </div>
                      <div class="col-3">
                        <label>Level:</label>
                        <div class="input-group">
                          <input class="form-control level" type="number" name="level" autofocus="" maxlength="254">
                        </div>
                      </div>
                      <div class="col-9">
                        <label>Date:</label>
                        <div class="input-group">
                          <input class="form-control date" type="date" name="date" autofocus="" maxlength="254" required>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-tertiary"><i class="fa fa-disk"></i>Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>

@endsection