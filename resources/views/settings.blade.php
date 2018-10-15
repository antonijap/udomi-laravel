@extends('templates.master')

@section('content')

  @include('partials.flash-message')

  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Postavke</h1>
          <h2 class="subtitle">Savjetujemo udrugama da ispune svoj profil kako bi posjetitelji stranice mogli lakše doći do vas, bilo da se radi u udomljavanju ili donacijama.</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding edit">
        <div class="cell small-12 medium-6">
          <form action="/settings" method="post">
            {{ csrf_field() }}
            <div class="grid-x">
              <div class="cell small-12">
                <label>Ime</label>
                <input class="input" type="text" name="name" value="{{$user->name}}">
              </div>

              <div class="cell small-12">
                <label>Opis</label>
                <textarea class="textarea" name="description" rows="5">{{$user->description}}</textarea>
              </div>

              <div class="cell small-12">
                <label>Kontakt</label>
                <p>Ove informacije će se pojaviti na vašem profilu radi lakšeg kontakta s potencijalnim udomiteljima.</p>
              </div>

              <div class="cell small-12">
                <label>Email (opcionalno)</label>
                <input class="input" type="text" name="contact_email" value="{{$user->contact_email}}">
              </div>

              <div class="cell small-12">
                <label>Telefon (opcionalno)</label>
                <input class="input" type="text" name="phone" value="{{$user->phone}}">
              </div>

              <div class="cell small-12">
                <label>IBAN za donacije (opcionalno)</label>
                <input class="input" type="text" name="iban" value="{{$user->iban}}">
              </div>

              <div class="cell small-12">
                <button type="submit" class="button">Ažuriraj profil</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials/errors')
@endsection
