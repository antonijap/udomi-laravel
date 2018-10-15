@extends('templates.master')

@section('content')
  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Login</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6">
          <form action="/login" method="post">
            {{ csrf_field() }}
            <div class="grid-x">
              <div class="cell small-12">
                <label>Email
                  <input class="input" type="email" name="email">
                </label>
              </div>

              <div class="cell small-12">
                <label>Lozinka
                  <input class="input" type="password" name="password">
                </label>
              </div>

              <div class="cell small-12">
                <button type="submit" class="button is-primary">Login</button>
              </div>

              <div class="cell small-12">
                <a href="/password/reset" style="padding-top: 3em; display: block;">Zaboravljena lozinka?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials.errors')

  @endsection
