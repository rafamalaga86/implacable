<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    
      <!-- Metadata -->
      <title>Implacable</title>
      {{--
      <meta property="og:title" content="{{ title|default:"What am I playing" }}" />
      <meta name="twitter:title" content="{{ title|default:"What am I playing" }}" />
      <meta name="description" content="{{ description|default:"Log what you play"}}">
      <meta property="og:description" content="{{ description|default:"Log what you play"}}" />
      <meta name="twitter:description" content="{{ description|default:"Log what you play"}}" />
      <meta property="og:site_name" content="What Am I Playing" />
      <meta property="og:locale" content="en_EN" />
      {% if  image_url%}
        <meta property="og:image" content="{{ image_url }}" />
        <meta name="twitter:image" content="{{ image_url }}" />
      {% else %}
        <meta property="og:image" content="{% static "favicon/apple-touch-icon.png" %}" />
        <meta name="twitter:image" content="{% static "favicon/apple-touch-icon.png" %}" />
      {% endif %}
      <meta property="og:type" content="article" />
      {# <meta property="og:image:width" content="1280" /> #}
      {# <meta property="og:image:height" content="700" /> #}
      <meta name="twitter:card" content="summary_large_image" />
    {% endblock %}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="152x152" href="{% static "favicon/apple-touch-icon.png" %}">
    <link rel="icon" type="image/png" sizes="32x32" href="{% static "favicon/favicon-32x32.png" %}">
    <link rel="icon" type="image/png" sizes="16x16" href="{% static "favicon/favicon-16x16.png" %}">
    <link rel="manifest" href="{% static "favicon/manifest.json" %}">
    <link rel="mask-icon" href="{% static "favicon/safari-pinned-tab.svg" %}" color="#5bbad5">
    <meta name="theme-color" content="#ffffff">
    --}}

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png">
    <link rel="manifest" href="/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS and Font Awesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Google Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Baloo|Bungee+Inline|Fjalla+One" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    <link href="{{ asset('styles.css') }}" rel="stylesheet">

  </head>

  <body data-storage-url="{{ config('filesystems.images_url') . config('filesystems.disks.ftp.root') }}">
    <div class="overlay"></div>

    <div class="wrapper">
      <!-- Sidebar Holder -->
      <nav id="sidebar" class="sidebar">
        <div id="dismiss" class="dismiss">
            <i class="fa fa-arrow-left"></i>
        </div>
        <div class="sidebar-header">
            <a href="{{ route('home') }}" class="navbar-brand">IMPLACABLE</a>
        </div>

        <ul class="components">
          <li><a class="menu-item" href="{{ action('ExerciseController@index') }}">Your Exercises</a></li>
          <li><a class="menu-item" href="{{ action('ExerciseController@indexAll') }}">Exercise Library</a></li>
          <li><a class="menu-item" href="{{ action('SessionController@indexSessionsByDay') }}">Sessions by Day</a></li>
        </ul>
        <ul class="list-unstyled pt-20">
          @if (Auth::user())
          <li>
            <div class="btn-container">
              <a href="{{ action('ExerciseController@create') }}" class="btn btn-primary">Add New Exercise</a>
            </div>
          </li>
            <li><a class="menu-item" href="/me">Profile page</a></li>
            <li><a class="menu-item" href="{{ route('log_out') }}">Log out</a></li>
          @else
            <li>
              <div class="btn-container">
                <a class="menu-item btn btn-primary" href="{{ action('UserController@create') }}">Register</a>
              </div>
            </li>
            <li><a class="menu-item" href="" data-toggle="modal" data-target="#modal-login">Log in</a></li>
          @endif
        </ul>
      </nav>

      <!-- Page Content Holder -->
      <div id="content" class="content">
        <div class="navbar navbar-custom navbar-dark" name="top">
          <div class="container d-flex justify-content-end">
            <a href="{{ route('home') }}" class="navbar-brand">
              <img src="{{ asset('images/logo/logo.png') }}" alt="implacable logo" width="40px" class="mr-3">
              IMPLACABLE
            </a>
            <ul class="d-flex flex-row ul-login desktop">
              @if (Auth::user())
                <li><a href="/me">{{ Auth::user()->name }}</a></li>
                <li><a href="{{ route('log_out') }}">Log out</a></li>
                <li><a class="btn btn-tertiary" href="{{ action('SessionController@indexSessionsByDay') }}">Sessions by Day</a></li>
              @else
                <li><a class="menu-item btn btn-secondary" href="{{ action('UserController@create') }}">Register</a></li>
                <li><a href="" data-toggle="modal" data-target="#modal-login">Log in</a></li>
              @endif
            </ul>
            <button class="navbar-toggler mr-0" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
        <div class="container flash-messages">
          <ul class="messages">
            @if(session('success'))
              <li class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </li>
            @endif

            @if(session('error'))
              <li class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </li>
            @endif

            @if(count($errors) > 0)
              <li class="alert alert-danger">
                @foreach ($errors->all() as $error)
                  <span>{{ $error }}</span>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </li>
            @endif
          </ul>
        </div>
        <main>
          @yield('main')
        </main>
        <footer class="text-muted">
          <div class="container">
            <p class="float-right">
              <a href="#top"><i class="fa fa-arrow-up back-to-top" aria-hidden="true"></i></a>
            </p>
            <p>Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="//rafaelgarciadoblas.com">Rafael García Doblas</a> and <a href="https://www.instagram.com/endemony/">Jonathan Menéndez Alonso</a></p>
          </div>
        </footer>

        <!-- Login modal -->
        <div id="modal-login" class="modal fade">
          <form id="form-login" class="text-left" action="{{ route('login') }}" method="POST">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header text-center">
                  <h3 class="modal-title w-100">Log in</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @csrf
                  <ul>
                    <li class="mb-2">
                      <label>Email:</label> 
                      <input class="form-control modal-autofocus" type="text" name="email" autofocus="" maxlength="254" required value="{{ old('email') }}">
                    </li>
                    <li>
                      <label>Password:</label>
                      <input class="form-control" type="password" name="password" required>
                    </li>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-tertiary">Log in</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <!-- Add Session Modal -->
        <div id="modal-add-session" class="modal fade">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h3 class="modal-title w-100">Add Session</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ action('SessionController@store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user() ? Auth::user()->id : '' }}">
                <input type="hidden" name="exercise_id" value="" class="copy-exercise">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-2 mb-3">
                      <label for="id_username">Sets:</label>
                      <div class="input-group">
                        <input value="" class="form-control modal-autofocus copy-sets" type="number" name="sets" autofocus="" maxlength="254" required>
                      </div>
                    </div>
                    <div class="col-1 mt-30 text-center">X</div>
                    <div class="col-3 mb-3">
                      <label for="id_username">Reps:</label>
                      <div class="input-group">
                        <input value="" class="form-control copy-reps" type="number" name="reps" autofocus="" maxlength="254" required>
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="id_username">Weight:</label>
                      <div class="input-group">
                        <input value="" class="form-control copy-weight" type="number" name="weight" autofocus="" maxlength="254">
                        <div class="input-group-append">
                          <div class="input-group-text">Kg</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-2">
                      <label for="id_username">Level:</label>
                      <div class="input-group">
                        <input value="" class="form-control copy-level" type="number" name="level" autofocus="" maxlength="254">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-tertiary"><i class="fa fa-disk"></i>Add</button>
                </div>
                  </form>
            </div>
          </div>
        </div>

        <!-- Modals -->
        <div id="modal-general" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <textarea class="form-control modal-autofocus" placeholder="Write your note about the game" name="text" cols="40" rows="10" id="id_note" required></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="action-trigger-modal-action">Save</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('js/masonry.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
  </body>
</html>
