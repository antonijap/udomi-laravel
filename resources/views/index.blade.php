@extends('templates.master')

@section('content')

  @include('partials.search')

  @include('partials.flash-message')

    <div class="grid-container fluid is-gray">
      <div class="grid-container has-padding">
        <div class="grid-x grid-margin-x">
          @foreach($ads as $ad)
            <div class="small-12 medium-6 large-4 cell">
              @include('partials.card')
            </div>
          @endforeach
        </div>
      </div>
    </div>

      <div class="grid-container">
        <div class="grid-x">
          <div class="cell">
            {{ $ads->links('pagination.simple-default') }}
          </div>
        </div>
      </div>
@endsection
