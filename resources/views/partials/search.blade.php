<div class="grid-container fluid has-bottom-border">
  <div class="grid-container">
    <div class="grid-x">
      <div class="cell intro text-center">
        <h1>Besplatan oglasnik za životinje</h1>
        <h2 class="subtitle hide-for-small-only">Najlakši način za pronaći ili oglasiti ljubimca. Kod nas je podizanje oglasa besplatno. Svi koji pomažu životinjama su dobrodošli, od udruga, preko samostalnih volontera do slučajnih prolaznika odbačenih životinja.</h2>
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
