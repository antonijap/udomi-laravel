@extends('templates.master')

@section('content')
  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Registracija</h1>
          <h2 class="subtitle">Pridužite se oglasniku napravljenom samo za životinje. Svi koji imaju dobre namjere u udomljavanju su dobrodošli na ovom oglasniku.</h2>
        </div>
      </div>
    </div>
  </div>

  @include('partials.flash-message')

  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6">
          <form action="/register" method="post">
            {{ csrf_field() }}
            <div class="grid-x">
              <div class="cell small-12">
                <label>Ime
                  <span class="input-helper">Može se kasnije promijeniti u postavkama.</span>
                  <input class="input" type="text" name="name">
                </label>
              </div>

              <div class="cell small-12">
                <label>Email
                  <input class="input" type="email" name="email">
                </label>
              </div>

              <div class="cell small-12">
                <label>Lozinka
                  <span class="input-helper">Mora sadržavati više od 6 znakova</span>
                  <input class="input" type="password" name="password">
                </label>
              </div>

              <div class="cell small-12">
                <button type="submit" class="button is-primary">Registriraj se</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  @include('partials.errors')

@endsection
