<div class="grid-container fluid has-bottom-border">
  <div class="grid-container no-js">
    <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
      <button type="button" data-toggle="responsive-menu" class="hamburger"><i class="ion-navicon"></i></button>
      <div class="title-bar-title">Izbornik</div>
    </div>

    <div class="top-bar" id="responsive-menu">
      <div class="top-bar-left">
        <ul class="vertical medium-horizontal menu">
          <li><a href="/" style="padding-left:0;"><img src="/storage/logo.svg" alt="Udomi.net" class="logo"></a></li>
          @guest
            <li><a href="/login" class="item">Login</a></li>
            <li><a href="/register" class="item">Registracija</a></li>
          @endguest
          <li><a href="/ads/new" class="item">Novi oglas</a></li>
          <li><a href="/about" class="item">O Projektu</a></li>
        </ul>
      </div>

      @auth
        <div class="top-bar-right">
          <ul class="medium-horizontal vertical dropdown menu" data-responsive-menu="accordion medium-dropdown">
            <li>
              <a href="/{{Auth::user()->clean(Auth::user()->username)}}/{{Auth::user()->id}} <i class="ion-ios-arrow-down arrow-down"></i></a>
              <ul class="menu vertical main-dropdown">
                <a href="/{{Auth::user()->clean(Auth::user()->username)}}/{{Auth::user()->id}}">Moj Profil</a>
                <a href="/dashboard">Moji oglasi</a>
                <a href="/settings">Postavke</a>
                <a href="/logout">Logout</a>
              </ul>
            </li>
          </ul>
        </div>
      @endauth


    </div>

  </div>
</div>
