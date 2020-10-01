@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Your Day Sessions</h1>
    </section>
    <section class="row">
        <table class="table table-striped table-dark">
          <tbody>
            @forelse ($day_sessions as $day_session)
            <tr>
              <td>{{ (new \Carbon\Carbon($day_session->date))->format('d/m/Y') }}</td>
              <td>{{ str_replace(',', ', ', $day_session->exercises) }}</td>
              <td><a class="btn btn-primary" href="{{ action('SessionController@indexInDate', ['date' => (new \Carbon\Carbon($day_session->date))->format('Y-m-d')]) }}">Show me this day</a></td>
            </tr>
            @empty
              You haven't done any exercise yet! Go and do something now!
            @endforelse
          </tbody>
        </table>
    </section>
  </div>
@endsection


