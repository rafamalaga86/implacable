@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Register</h1>
    </section>
    <section class="row">
      <div class="col-lg-6">
        <form class="text-left" action="{{ action('UserController@store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input class="form-control" type="password" name="password_confirmation">
          </div>
        <button class="btn btn-primary" type="submit">Register</button>
        </form>
      </div>
      <div class="col-lg-6 mt-5 mt-lg-0 text-left">
        With <em>Implacable</em> you can:
        <ul class="list-tick">
          <li>Monitor the last sets, reps and weight in exercises.</li>
          <li>Check the frecuency of your training</li>
          <li>See the increment in the exercise</li>
          <li>And much more...</li>
        </ul>
      </div>
    </section>
  </div>
@endsection
