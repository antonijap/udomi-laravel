@extends('templates.master')

@section('content')

  @include('partials.flash-message')

  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x top align-middle">
        <div class="auto cell">
          <h1>Dashboard</h1>
        </div>

        <div class="cell shrink">
          @if ($user->boost->isAvailable())
            {{-- <span class="tag is-success"></span> --}}
            <h5>Boost dostupan</h5>
          @else
            {{-- <span class="tag is-danger">Boost nedostupan. {{ $user->boost->nextBoostAvailable() }} </span> --}}
            <h5>Boost nedostupan. {{ $user->boost->nextBoostAvailable() }}</h5>
          @endif
        </div>

      </div>
    </div>
  </div>
</div>

<div class="grid-container fluid has-padding is-gray">
  <div class="grid-container">
    <ul class="tabs" data-tabs id="tabs">
      <li class="tabs-title is-active"><a href="#aktivni" aria-selected="true">Aktivni</a></li>
      <li class="tabs-title"><a href="#udomljeni">Udomljeni</a></li>
    </ul>
    <div class="tabs-content" data-tabs-content="tabs">

      <div class="tabs-panel is-active" id="aktivni">
        <div class="grid-x">
          @if (count($ads) > 0)
            @foreach($ads as $ad)
              @if($ad->is_adopted == 0)
                <div class="cell small-12 dashboard-ad-has-bottom-border">
                  <div class="grid-x grid-margin-x align-middle">
                    <div class="small-12 medium-2 cell has-bottom-margin">
                      @php
                        $check = 0
                      @endphp
                      @foreach ($ad->photos as $photo)
                        @if ($photo->is_primary == true)
                          <img src="{{$photo->filename}}" alt="{{$ad->name}}" class="small-image">
                          @php
                            $check = 1
                          @endphp
                        @endif
                      @endforeach

                      @if ($check != 1)
                        <img src="{{$ad->photos->first()->filename}}" alt="{{$ad->name}}" class="small-image">
                      @endif
                    </div>

                    <div class="auto cell">
                      <h3>{{$ad->name}}</h3>
                    </div>

                    <div class="small-12 medium-5 cell">
                      <div class="button-group expanded stacked-for-small">
                        <a href="ad/{{$ad->id}}/edit" name="uredi" class="button hollow secondary">Uredi</a>

                        @if($ad->sex == 'female')
                          <a href="ad/{{$ad->id}}/adopted" name="is-adopted" class="button hollow secondary">Udomljena</a>
                        @elseif($ad->sex == 'male')
                          <a href="ad/{{$ad->id}}/adopted" name="is-adopted" class="button hollow secondary">Udomljen</a>
                        @endif

                        <!-- <a data-open="obrisi" name="delete" class="button alert">Obriši</a> -->

                        <a href="/ad/{{$ad->id}}/delete" class="button alert">Delete</a>

                        <div class="reveal" id="obrisi" data-reveal>
                          <div class="grid-x grid-padding-x text-center">
                            <div class="cell has-padding">
                              <h4>Potvrdi brisanje oglasa</h4>
                              <a href="ad/{{$ad->id}}/delete" data-open="obrisi" name="delete" class="button alert expanded">Da, Obriši</a>

                              <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          </div>
                        </div>

                        @if ($user->boost->isAvailable())
                          <a href="ad/{{$ad->id}}/boost" name="boost" class="button success">Boost</a>
                        @else
                          <a type="button" name="boost" class="success button" disabled>Boost</a>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>

      <div class="tabs-panel" id="udomljeni">
        <div class="grid-x">
          @if (count($ads) > 0)
            @foreach($ads as $ad)
              @if($ad->is_adopted == 1)
                <div class="cell small-12 dashboard-ad-has-bottom-border">
                  <div class="grid-x grid-margin-x align-middle">
                    <div class="small-12 medium-2  cell has-bottom-margin">
                      <img class="small-image" src="{{$ad->photos->first()->filename}}" alt="{{$ad->name}}">
                    </div>

                    <div class="auto cell">
                      <h3>{{$ad->name}}</h3>
                    </div>

                    <div class="small-12 medium-2  cell">
                      <a href="ad/{{$ad->id}}/restore" name="delete" class="hollow secondary button">Vrati u aktivne</a>
                    </div>

                  </div>
                </div>
              @endif
            @endforeach
          @endif

        </div>

      </div>
    </div>
  </div>
</div>
@endsection
