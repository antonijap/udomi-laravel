<div class="grid-container fluid has-bottom-border">
  <div class="grid-container">
    <div class="grid-x">
      <div class="small-12 medium-12 large-9 cell intro">
        <h1>Besplatan oglasnik za životinje</h1>
        <h2 class="subtitle">Najlakši način za pronaći ili oglasiti ljubimca. Kod nas je boost besplatan. Svi koji pomažu životinjama su dobrodošli, od udruga, preko samostalnih volontera do slučajnih prolaznika odbačenih životinja.</h2>
        @guest
            <a href="/register" class="button large CTA">Predaj oglas</a>
        @endguest
        @auth
            <a href="/ads/new" class="button large CTA">Predaj oglas</a>
        @endauth
      </div>
    </div>
  </div>
</div>


<div class="grid-container fluid has-bottom-border">
  <div class="grid-container">
    @include('partials.min-search')
  </div>
</div>
