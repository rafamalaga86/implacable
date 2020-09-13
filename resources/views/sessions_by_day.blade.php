@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Your Day Sessions</h1>
    </section>
    <section class="row">
        <table class="table table-striped table-dark">
          <tbody>
            @foreach ($day_sessions as $day_session)
            <tr>
              <td>{{ (new \Carbon\Carbon($day_session->date))->format('d/m/Y') }}</td>
              <td>{{ str_replace(',', ', ', $day_session->exercises) }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </section>
  </div>
@endsection


