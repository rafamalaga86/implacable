@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Edit exercise: {{ $exercise->name }}</h1>
    </section>
    <section class="row">
      <div class="col-lg-6">
        <form class="text-left" action="{{ action('ExerciseController@update', $exercise->id) }}" method="POST">
          @csrf
          {{ method_field('PATCH') }}
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ $exercise->name }}">
          </div>
          <div class="form-group">
            <label>Image url</label>
            <input class="form-control image_url_event" type="text" name="image_url" value="{{ $exercise->image_url }}">
          </div>
          <div class="form-group">
            <label>Category</label>
            <input class="form-control" type="text" name="category" value="{{ $exercise->category }}">
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Optional...">{{ $exercise->description }}</textarea>
          </div>
        <button class="btn btn-primary" type="submit">Update Exercise</button>
        </form>
      </div>
      <div class="col-lg-6 mt-5 mt-lg-0 text-left">
        <img class="put-image w-100" src="{{ $exercise->image_url }}" alt="">
      </div>
    </section>
  </div>
@endsection