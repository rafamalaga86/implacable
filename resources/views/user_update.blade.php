@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Your details</h1>
    </section>

    <form class="text-left" action="{{ action('UserController@update', $user) }}" method="POST">
      <section class="row">
          <div class="col-lg-6 mt-5 mt-lg-0 text-left">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
              <label>Name</label>
              <input class="form-control" type="text" name="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input class="form-control" type="text" name="email" value="{{ $user->email }}">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Password</label>
              <input class="form-control" type="password" name="password" value="">
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input class="form-control" type="password" name="password_confirmation" value="">
            </div>
          </div>
      </section>
      <button class="btn btn-primary" type="submit">Update</button>
    </form>

  </div>
@endsection
