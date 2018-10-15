
@extends('templates.master')

@section('content')
  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Resetiraj lozinku</h1>
        </div>
      </div>
    </div>
  </div>

  @include('partials/flash-message')

  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6">
          <form method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="cell small-12">
              <label>Email
                <input class="input" type="email" name="email">
              </label>
            </div>

            <div class="cell small-12">
              <button type="submit" class="button is-primary">Resetiraj lozinku</button>
            </div>

            </form>
        </div>
      </div>
    </div>

  @include('partials.errors')

@endsection
