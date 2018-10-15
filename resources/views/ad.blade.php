@extends('templates.master') @section('content')
<div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
        <div class="grid-x align-middle">
            <div class="medium-auto small-12 cell top">
                <h1 style="margin:0;">
                    {{$ad->name}}
                    @if ($ad->is_adopted)
                        @if ($ad->sex == 'female')
                            je udomljena!
                        @else
                            je udomljen!
                        @endif
                    @endif
                </h1>
                <a href="/{{$ad->user->clean($ad->user->username)}}/{{$ad->user->id}}">
                    {{$ad->user->name}}
                </a>
            </div>
            <div class="medium-3 small-12 social-buttons">
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>
    </div>
</div>
<div class="grid-container fluid is-gray has-padding animal">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell small-12 medium-6 has-right-padding">
              <div class="cell small-12">
                  <h2>Vrsta</h2>
                  @if ($ad->type == 'dog')
                  <p>Pas</p>
              @elseif ($ad->type == 'cat')
                  <p>Mačka</p>
                  @elseif ($ad->type == 'kunici-i-glodavci')
                  <p>Kunići i glodavci</p>
                  @else
                  <p>Ostale životinje</p>
                  @endif
              </div>
                <div class="cell small-12">
                    <h2>Spol</h2>
                    @if ($ad->sex == 'female')
                    <p>Ženka</p>
                    @else
                    <p>Mužjak</p>
                    @endif
                </div>
                <div class="cell small-12">
                    <h2>Lokacija</h2>
                    @if ($ad->location == 'bjelovarsko-bilogorska')
                        <p>Bjelovarsko-bilogorska</p>
                    @elseif ($ad->location == 'brodsko-posavska')
                        <p>Brodsko-posavska</p>
                    @elseif ($ad->location == 'dubrovacko-neretvanska')
                        <p>Dubrovačko-neretvanska</p>
                    @elseif ($ad->location == 'grad-zagreb')
                        <p>Grad Zagreb</p>
                    @elseif ($ad->location == 'istarska')
                        <p>Istarska</p>
                    @elseif ($ad->location == 'karlovacka')
                        <p>Karlovačka</p>
                    @elseif ($ad->location == 'koprivnicko-krizevacka')
                        <p>Koprivničko-križevačka</p>
                    @elseif ($ad->location == 'krapinsko-zagorska')
                        <p>Krapinsko-zagorska</p>
                    @elseif ($ad->location == 'licko-senjska')
                        <p>Ličko-senjska</p>
                    @elseif ($ad->location == 'medimurska')
                        <p>Međimurska</p>
                    @elseif ($ad->location == 'osjecko-baranjska')
                        <p>Osječko-baranjska</p>
                    @elseif ($ad->location == 'pozesko-slavonska')
                        <p>Požeško-slavonska</p>
                    @elseif ($ad->location == 'primorsko-goranska')
                        <p>Primorsko-goranska</p>
                    @elseif ($ad->location == 'sisasko-moslavcka')
                        <p>Sisačko-moslavačka</p>
                    @elseif ($ad->location == 'splitsko-dalmatinska')
                        <p>Splitsko-dalmatinska</p>
                    @elseif ($ad->location == 'sibensko-kninska')
                        <p>Šibensko-kninska</p>
                    @elseif ($ad->location == 'varazdinska')
                        <p>Varaždinska</p>
                    @elseif ($ad->location == 'viroviticko-podravska')
                        <p>Virovitičko-podravska</p>
                    @elseif ($ad->location == 'vukovarsko-srijemska')
                        <p>Vukovarsko-srijemska</p>
                    @elseif ($ad->location == 'zadarska')
                        <p>Zadarska</p>
                    @elseif ($ad->location == 'zagrebacka')
                        <p>Zagrebačka</p>
                    @elseif ($ad->location == 'izvan-hrvatske')
                        <p>Izvan Hrvatske</p>
                    @endif
                </div>


                @if ($ad->user->phone)
                    <div class="cell small-12">
                        <h2>Telefon</h2>
                        <p>{{$ad->user->phone}}</p>
                    </div>
                @endif


                <div class="cell small-12">
                    <h2>Opis</h2>
                    <p>{{$ad->description}}</p>
                </div>

                {{-- Tagovi --}}
                <div class="grid-x grid-margin-x has-margin">
                    @if ($ad->age == 'junior')
                    <div style="margin-right:0;" class="cell shrink">
                        <span class="label">Mladi</span>
                    </div>
                    @endif @if ($ad->invalidity == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        <span class="label special">Posebna</span>
                    </div>
                    @endif @if ($ad->castration == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Kastrirana</span> @else
                        <span class="label positive">Kastriran</span> @endif
                    </div>
                    @endif @if ($ad->sterilization == 'on')
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Sterilizirana</span> @else
                        <span class="label positive">Steriliziran</span> @endif
                    </div>
                    @endif @if ($ad->vaccines == 1)
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Cijepljena</span> @else
                        <span class="label positive">Cijepljen</span> @endif
                    </div>
                    @endif @if ($ad->chip == 1)
                    <div style="margin-right:0;" class="cell shrink">
                        @if ($ad->sex == 'female')
                        <span class="label positive">Čipirana</span> @else
                        <span class="label positive">Čipiran</span> @endif
                    </div>
                    @endif
                </div>

                @if (!$ad->is_adopted)
                    <div class="cell small-12" style="margin-top: 2em;">
                    <h2>Kontakt</h2>
                    <form action="/{{$ad->id}}/contact" method="post">
                        {{ csrf_field() }}
                        <label>Email
                            <input type="email" name="email" />
                        </label>
                        <label>Poruka
                            <textarea name="poruka" cols="30" rows="3"></textarea>
                        </label>
                        <input type="submit" value="Pošalji" class="button" />
                    </form>
                </div>
                @endif


            </div>
            <div class="cell small-12 medium-6">
                <div class="owl-carousel owl-theme chocolat-parent">
                    @foreach ($slike as $photo)
                    <a class="chocolat-image" href="/{{$photo->filename}}" title="{{$ad->name}}">
                        <img src="/{{$photo->filename}}" />
                    </a> @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('partials.errors')
@include('partials.flash-message')
@endsection
