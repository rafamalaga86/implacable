@extends('parts/base')

@section('main')
  <div class="container">
    <section class="title text-center">    
      <h1>Create exercise</h1>
    </section>
    <section class="row">
      <div class="col-lg-6">
        <form class="text-left" action="{{ action('ExerciseController@store') }}" method="POST">
          @csrf
          <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label>Image url</label>
            <input class="form-control image_url_event" type="text" name="image_url" value="{{ old('image_url') }}">
          </div>
          <div class="form-group">
            <label>Category</label>
            <select class="form-control tt-capitalize" name="category">
              @foreach (\App\Exercise::getCategoryValues() as $category)
                <option {{ old('category') == $category ? 'selected' : '' }} value="{{ $category }}">{{ $category }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="3" placeholder="Optional...">{{ old('description') }}</textarea>
          </div>
        <button class="btn btn-primary" type="submit">Create Exercise</button>
        </form>
      </div>
      <div class="col-lg-6 mt-5 mt-lg-0 text-left">
        <img class="put-image w-100" src="" alt="">
      </div>
    </section>
  </div>
@endsection
