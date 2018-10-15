@extends('templates.master')

@section('content')

  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell">
          @include('partials.min-search')
        </div>
      </div>
    </div>
  </div>

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

  @if($ads instanceof \Illuminate\Pagination\LengthAwarePaginator )
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell">
          {{ $ads->appends(request()->input())->links('pagination.simple-default') }}
        </div>
      </div>
    </div>
  @endif

@endsection
