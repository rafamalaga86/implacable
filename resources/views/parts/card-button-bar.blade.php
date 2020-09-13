@if (Auth::user())
<a href="{{ action('ExerciseController@edit', $exercise->id) }}" data-toggle="tooltip" data-placement="bottom" title="Edit Exercise">
    <i class="fa fa-pencil" aria-hidden="true"></i>
    </a>
<a data-toggle="tooltip" data-placement="bottom" title="See all sessions for this exercise" href="{{ action('SessionController@indexByExercise', $exercise->id) }}"><i class="fa fa-list-ul"></i></a>
<span class="cursor-pointer action-open-modal-add-session" data-toggle="modal" data-target="#modal-add-session">
  <span data-toggle="tooltip" data-placement="bottom" title="Add new session" href="">
@else
<a href="" data-toggle="modal" data-target="#modal-login">
@endif
  <i class="fa fa-plus"></i>
  </span>
</span>
