@extends('templates.master')

@section('content')

  <div class="grid-container fluid has-bottom-border has-padding">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>{{$user->name}}</h1>
          <h2 class="subtitle">{{$user->description}}</h2>
        </div>
      </div>

      <div class="grid-x grid-margin-x">
        @if (! empty($user->contact_email))
          <div class="cell small-12 medium-shrink">
            <i class="ion-ios-email" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->contact_email}}
          </div>
        @endif

        @if (! empty($user->phone))
          <div class="cell small-12 medium-shrink">
            <i class="ion-ios-telephone" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->phone}}
          </div>
        @endif

        @if (! empty($user->iban))
          <div class="cell small-12 medium-shrink">
            <i class="ion-card" style="font-size:25px; top:3px; position:relative; padding-right:.3em;"></i> {{$user->iban}}
          </div>
        @endif
      </div>
    </div>
  </div>


  <div class="grid-container fluid is-gray">
    <div class="grid-container has-padding">
      <div class="grid-x grid-margin-x">
        @foreach($ads as $ad)
          @if ($ad->is_adopted == false)
            <div class="small-12 medium-6 large-4 cell">
              @include('partials.card')
            </div>
          @endif
        @endforeach

        <div class="small-12 cell">
          <h3 class="profile-section">Udomljeni</h3>
        </div>

        @foreach($ads as $ad)
          @if ($ad->is_adopted == true)
            <div class="small-12 medium-6 large-4 cell">
              @include('partials.card')
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>

@endsection
