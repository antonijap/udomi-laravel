@if ($flash = session('message'))
  <p class="flash-message">{{$flash}}</p>
@endif
