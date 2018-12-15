<div class="card">
    @if ($ad->user->username)
      <a href="/{{$ad->user->clean($ad->user->username)}}/{{$ad->id}}/{{$ad->slug}}">
    @php
      $check = 0
    @endphp
    @foreach ($ad->photos as $photo)
      @if ($photo->is_primary == true)
        <img src="/{{$photo->filename}}" alt="{{$ad->name}}" class="card-image">
        @php
          $check = 1
        @endphp
      
    @endforeach

    @if ($check != 1)
      <img src="/{{$ad->photos->first()->filename}}" alt="{{$ad->name}}" class="card-image">
    @endif

  </a>
  <div class="card-section">
    <a href="/{{$ad->user->clean($ad->user->username)}}/{{$ad->id}}/{{$ad->slug}}">
      <h4>{{$ad->name}}</h4>
    </a>

    <a href="/{{$ad->user->clean($ad->user->username)}}/{{$ad->user->id}}">
      {{$ad->user->name}}
    </a>
    {{-- <p>{!! \Illuminate\Support\Str::words($ad->description, 15,'...')  !!}</p> --}}
    <p>{{ str_limit($ad->description, 80) }}</p>
    {{-- Tags --}}


    @if ($ad->age == 'junior')
        <span class="label">Mladi</span>
    {{-- @elseif ($ad->age == 'adult')
        <span class="label">Odrasli</span> --}}
    @endif

    @if ($ad->invalidity == 'on')
        <span class="label special">Posebna</span>
    @endif

    @if ($ad->castration == 'on')
        @if ($ad->sex == 'female')
          <span class="label positive">Kastrirana</span>
        @else
          <span class="label positive">Kastriran</span>
        @endif
    @endif

    @if ($ad->sterilization == 'on')
      @if ($ad->sex == 'female')
        <span class="label positive">Sterilizirana</span>
      @else
        <span class="label positive">Steriliziran</span>
      @endif
    @endif

    @if ($ad->vaccines == 1)
      @if ($ad->sex == 'female')
        <span class="label positive">Cijepljena</span>
      @else
        <span class="label positive">Cijepljen</span>
      @endif
    @endif

    @if ($ad->chip == 1)
      @if ($ad->sex == 'female')
        <span class="label positive">Čipirana</span>
      @else
        <span class="label positive">Čipiran</span>
      @endif
    @endif
    @endif
  </div>
</div>
