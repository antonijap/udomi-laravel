@extends('templates.master')

@section('content')

  <div class="grid-container fluid has-bottom-border">
    <div class="grid-container">
      <div class="grid-x">
        <div class="cell top">
          <h1>Novi Oglas</h1>
          <h2 class="subtitle">Budite kreativni i probajte nabaviti kvalitetne fotografije.</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="grid-container fluid is-gray">
    <div class="grid-container">
      <div class="grid-x has-padding ">
        <div class="cell small-12 medium-6 new">
          <form action="/ads/new" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="grid-x">
              <div class="cell small-12">
                <label>Ime</label>
                <p>Molimo napišite samo ime životinje, ograničenje je na 10 znakova.</p>
                <input class="input" type="text" name="name" value="{{ old('name') }}">

              </div>

              <div class="cell small-12">
                <label>Vrsta
                  <select name="type">
                    <option disabled selected>Odaberi vrstu</option>
                    <option value="cat" {{ old('type') == 'cat' ? 'selected' : '' }}>Mačka</option>
                    <option value="dog" {{ old('type') == 'dog' ? 'selected' : '' }}>Pas</option>
                    <option value="kunici-i-glodavci" {{ old('type') == 'kunici-i-glodavci' ? 'selected' : '' }}>Kunići i glodavci</option>
                    <option value="ostale-zivotinje" {{ old('type') == 'ostale-zivotinje' ? 'selected' : '' }}>Ostale životinje</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Spol
                  <select name="sex">
                    <option disabled selected>Odaberi spol</option>
                    <option value="female" {{ old('sex') == 'female' ? 'selected' : '' }}>Ženka</option>
                    <option value="male" {{ old('sex') == 'male' ? 'selected' : '' }}>Mužjak</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Starost
                  <select name="age">
                    <option disabled selected>Odaberi starost</option>
                    <option value="junior" {{ old('age') == 'junior' ? 'selected' : '' }}>Mladi</option>
                    <option value="adult" {{ old('age') == 'adult' ? 'selected' : '' }}>Odrasli</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Lokacija
                  <select name="location">
                    <option disabled selected>Odaberi lokaciju</option>
                    <option value="bjelovarsko-bilogorska" {{ old('location') == 'bjelovarsko-bilogorska' ? 'selected' : '' }}>Bjelovarsko-bilogorska</option>
                    <option value="brodsko-posavska" {{ old('location') == 'brodsko-posavska' ? 'selected' : '' }}>Brodsko-posavska</option>
                    <option value="dubrovacko-neretvanska" {{ old('location') == 'dubrovacko-neretvanska' ? 'selected' : '' }}>Dubrovačko-neretvanska</option>
                    <option value="grad-zagreb" {{ old('location') == 'grad-zagreb' ? 'selected' : '' }}>Grad Zagreb</option>
                    <option value="istarska" {{ old('location') == 'istarska' ? 'selected' : '' }}>Istarska</option>
                    <option value="karlovacka" {{ old('location') == 'karlovacka' ? 'selected' : '' }}>Karlovačka</option>
                    <option value="koprivnicko-krizevacka" {{ old('location') == 'koprivnicko-krizevacka' ? 'selected' : '' }}>Koprivničko-križevačka</option>
                    <option value="krapinsko-zagorska" {{ old('location') == 'krapinsko-zagorska' ? 'selected' : '' }}>Krapinsko-zagorska</option>
                    <option value="licko-senjska" {{ old('location') == 'licko-senjska' ? 'selected' : '' }}>Ličko-senjska</option>
                    <option value="medimurska" {{ old('location') == 'medimurska' ? 'selected' : '' }}>Međimurska</option>
                    <option value="osjecko-baranjska" {{ old('location') == 'osjecko-baranjska' ? 'selected' : '' }}>Osječko-baranjska</option>
                    <option value="pozesko-slavonska" {{ old('location') == 'pozesko-slavonska' ? 'selected' : '' }}>Požeško-slavonska</option>
                    <option value="primorsko-goranska" {{ old('location') == 'primorsko-goranska' ? 'selected' : '' }}>Primorsko-goranska</option>
                    <option value="sisasko-moslavcka" {{ old('location') == 'sisasko-moslavcka' ? 'selected' : '' }}>Sisačko-moslavačka</option>
                    <option value="splitsko-dalmatinska" {{ old('location') == 'splitsko-dalmatinska' ? 'selected' : '' }}>Splitsko-dalmatinska</option>
                    <option value="sibensko-kninska" {{ old('location') == 'sibensko-kninska' ? 'selected' : '' }}>Šibensko-kninska</option>
                    <option value="varazdinska" {{ old('location') == 'varazdinska' ? 'selected' : '' }}>Varaždinska</option>
                    <option value="viroviticko-podravska" {{ old('location') == 'viroviticko-podravska' ? 'selected' : '' }}>Virovitičko-podravska</option>
                    <option value="vukovarsko-srijemska" {{ old('location') == 'vukovarsko-srijemska' ? 'selected' : '' }}>Vukovarsko-srijemska</option>
                    <option value="zadarska" {{ old('location') == 'zadarska' ? 'selected' : '' }}>Zadarska</option>
                    <option value="zagrebacka" {{ old('location') == 'zagrebacka' ? 'selected' : '' }}>Zagrebačka</option>
                    <option value="izvan-hrvatske" {{ old('location') == 'izvan-hrvatske' ? 'selected' : '' }}>Izvan Hrvatske</option>
                  </select>
                </label>
              </div>

              <div class="cell small-12">
                <label>Opis</label>
                <textarea name="description" class="textarea" rows="10" id="counter">{{ old('description') }}</textarea><br>
              </div>

              <div class="cell small-12">
                <label>Slike</label>
                <p>Prva slika će biti na oglasu, ostale u galeriji. Maksimalna veličina svake slike je 2MB.</p>
              </div>

              <div class="cell small-12">
                <span class="fileuploader-action-popup">
                  <input type="file" name="files">
                </span>
              </div>

              <div class="cell small-12">
                <label>Ostale informacije</label>
                <p>Ako životinja ima invaliditet molimo opišite ga i u opisu oglasa.</p>
              </div>

              <div class="cell small-12">
                  <input name="invalidity" type="checkbox" id="invaliditet" {{ old('invalidity') == 'on' ? 'checked' : '' }}><label for="invaliditet">Invaliditet</label>
              </div>

              <div class="cell small-12">
                <input name="castration" type="checkbox" id="castration" {{ old('castration') == 'on' ? 'checked' : '' }}><label for="castration">Kastracija</label>
              </div>

              <div class="cell small-12">
                <input name="sterilization" type="checkbox" id="sterilization" {{ old('sterilization') == 'on' ? 'checked' : '' }}><label for="sterilization">Sterilizacija</label>
              </div>

              <div class="cell small-12">
                <input name="vaccines" type="checkbox" id="vaccines" {{ old('vaccines') == true ? 'checked' : '' }}><label for="vaccines">Cijepljenje</label>
              </div>

              <div class="cell small-12">
                <input name="chip" type="checkbox" id="chip" {{ old('chip') == true ? 'checked' : '' }}><label for="chip">Čipiranje</label>
              </div>

              <div class="cell small-12" style="padding-top:2em;">
                <input type="submit" value="Kreiraj oglas" class="button">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials.errors')
  @endsection
