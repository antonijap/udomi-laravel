@extends('templates.master')

@section('content')
<div class="grid-container fluid has-bottom-border">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell top">
        <h1>Nova lozinka</h1>
      </div>
    </div>
  </div>
</div>


@include('partials.errors')

<div class="grid-container fluid is-gray">
  <div class="grid-container">
    <div class="grid-x has-padding ">
      <div class="cell small-12 medium-6">
        <form action="{{ route('password.request') }}" method="post">
          {{ csrf_field() }}
          
          <input type="hidden" name="token" value="{{ $token }}">

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
            <label>Potvrdi lozinku
              <input class="input" type="password" name="password_confirmation">
            </label>
          </div>

          <div class="cell small-12">
            <button type="submit" class="button is-primary">Resetiraj lozinku</button>
          </div>

        </form>

        @include('partials.errors')
      </div>
    </div>
  </div>
  @endsection
