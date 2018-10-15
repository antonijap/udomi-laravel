@extends('templates.master')

@section('content')

    <div class="grid-container fluid has-bottom-border">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell top">
                    <h1>Uredi oglas: <i>{{$ad->name}}</i></h1>
                </div>
            </div>
        </div>
    </div>


    <div class="grid-container fluid is-gray">
        <div class="grid-container">
            <div class="grid-x has-padding ">
                <div class="cell small-12 medium-6 new">
                    <form action="/ad/{{$ad->id}}/edit" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="grid-x">
                            <div class="cell small-12">
                                <label>Ime
                                    <input class="input" type="text" name="name" value="{{$ad->name}}">
                                </label>
                            </div>

                            <div class="cell small-12">
                                <label>Vrsta
                                    <select name="type">
                                        <option value="cat" {{ $ad->type == 'cat' ? 'selected' : '' }}>Mačka</option>
                                        <option value="dog" {{ $ad->type == 'dog' ? 'selected' : '' }}>Pas</option>
                                        <option value="kunici-i-glodavci" {{ $ad->type == 'kunici-i-glodavci' ? 'selected' : '' }}>Kunići i glodavci</option>
                                        <option value="ostale-zivotinje" {{ $ad->type == 'ostale-zivotinje' ? 'selected' : '' }}>Ostale životinje</option>
                                    </select>
                                </label>
                            </div>

                            <div class="cell small-12">
                                <label>Spol
                                    <select name="sex">
                                        <option value="female" {{ $ad->sex == 'female' ? 'selected' : '' }}>Ženka</option>
                                        <option value="male" {{ $ad->sex == 'male' ? 'selected' : '' }}>Mužjak</option>
                                    </select>
                                </label>
                            </div>

                            <div class="cell small-12">
                                <label>Starost
                                    <select name="age">
                                        <option value="junior" {{ $ad->age == 'junior' ? 'selected' : '' }}>Mladi</option>
                                        <option value="adult" {{ $ad->age == 'adult' ? 'selected' : '' }}>Odrasli</option>
                                    </select>
                                </label>
                            </div>

                            <div class="cell small-12">
                                <label>Lokacija
                                    <select name="location">
                                        <option value="all" {{ $ad->location == 'svejedno' ? 'selected' : '' }}>Svejedno</option>
                                        <option value="bjelovarsko-bilogorska" {{ $ad->location == 'bjelovarsko-bilogorska' ? 'selected' : '' }}>Bjelovarsko-bilogorska</option>
                                        <option value="brodsko-posavska" {{ $ad->location == 'brodsko-posavska' ? 'selected' : '' }}>Brodsko-posavska</option>
                                        <option value="dubrovacko-neretvanska" {{ $ad->location == 'dubrovacko-neretvanska' ? 'selected' : '' }}>Dubrovačko-neretvanska</option>
                                        <option value="grad-zagreb" {{ $ad->location == 'grad-zagreb' ? 'selected' : '' }}>Grad Zagreb</option>
                                        <option value="istarska" {{ $ad->location == 'istarska' ? 'selected' : '' }}>Istarska</option>
                                        <option value="karlovacka" {{ $ad->location == 'karlovacka' ? 'selected' : '' }}>Karlovačka</option>
                                        <option value="koprivnicko-krizevacka" {{ $ad->location == 'koprivnicko-krizevacka' ? 'selected' : '' }}>Koprivničko-križevačka</option>
                                        <option value="krapinsko-zagorska" {{ $ad->location == 'krapinsko-zagorska' ? 'selected' : '' }}>Krapinsko-zagorska</option>
                                        <option value="licko-senjska" {{ $ad->location == 'licko-senjska' ? 'selected' : '' }}>Ličko-senjska</option>
                                        <option value="medimurska" {{ $ad->location == 'medimurska' ? 'selected' : '' }}>Međimurska</option>
                                        <option value="osjecko-baranjska" {{ $ad->location == 'osjecko-baranjska' ? 'selected' : '' }}>Osječko-baranjska</option>
                                        <option value="pozesko-slavonska" {{ $ad->location == 'pozesko-slavonska' ? 'selected' : '' }}>Požeško-slavonska</option>
                                        <option value="primorsko-goranska" {{ $ad->location == 'primorsko-goranska' ? 'selected' : '' }}>Primorsko-goranska</option>
                                        <option value="sisasko-moslavcka" {{ $ad->location == 'sisasko-moslavcka' ? 'selected' : '' }}>Sisačko-moslavačka</option>
                                        <option value="splitsko-dalmatinska" {{ $ad->location == 'splitsko-dalmatinska' ? 'selected' : '' }}>Splitsko-dalmatinska</option>
                                        <option value="sibensko-kninska" {{ $ad->location == 'sibensko-kninska' ? 'selected' : '' }}>Šibensko-kninska</option>
                                        <option value="varazdinska" {{ $ad->location == 'varazdinska' ? 'selected' : '' }}>Varaždinska</option>
                                        <option value="viroviticko-podravska" {{ $ad->location == 'viroviticko-podravska' ? 'selected' : '' }}>Virovitičko-podravska</option>
                                        <option value="vukovarsko-srijemska" {{ $ad->location == 'vukovarsko-srijemska' ? 'selected' : '' }}>Vukovarsko-srijemska</option>
                                        <option value="zadarska" {{ $ad->location == 'zadarska' ? 'selected' : '' }}>Zadarska</option>
                                        <option value="zagrebacka" {{ $ad->location == 'zagrebacka' ? 'selected' : '' }}>Zagrebačka</option>
                                        <option value="izvan-hrvatske" {{ $ad->location == 'izvan-hrvatske' ? 'selected' : '' }}>Izvan Hrvatske</option>
                                    </select>
                                </label>
                            </div>

                            <div class="cell small-12">
                                <label>Opis</label>
                                <p>Mora biti iznad 32 znaka.</p>
                                <textarea name="description" class="textarea" rows="10" id="counter">{{$ad->description}}</textarea><br>

                            </div>

                            <div class="cell small-12">
                                <label>Slike</label>
                                <p>Prva slika će biti na oglasu, ostale u galeriji. Maksimalna veličina svake slike je 2MB.</p>
                            </div>

                            <div class="cell small-12">
                                <input type="file" name="files" data-fileuploader-files='{{ $photos }}'>
                            </div>

                            <div class="cell small-12">
                                <label>Ostale informacije</label>
                                <p>Ako životinja ima invaliditet molimo opišite ga i u opisu oglasa.</p>
                            </div>

                            <div class="cell small-12">
                                <input name="invalidity" type="checkbox" id="invaliditet" {{ $ad->invalidity == 'on' ? 'checked' : '' }}><label for="invaliditet">Invaliditet</label>
                            </div>

                            <div class="cell small-12">
                                <input name="castration" type="checkbox" id="castration" {{ $ad->castration == 'on' ? 'checked' : '' }}><label for="castration">Kastracija</label>
                            </div>

                            <div class="cell small-12">
                                <input name="sterilization" type="checkbox" id="sterilization" {{ $ad->sterilization == 'on' ? 'checked' : '' }}><label for="sterilization">Sterilizacija</label>
                            </div>

                            <div class="cell small-12">
                                <input name="vaccines" type="checkbox" id="vaccines" {{ $ad->vaccines == true ? 'checked' : '' }}><label for="vaccines">Cijepljenje</label>
                            </div>

                            <div class="cell small-12">
                                <input name="chip" type="checkbox" id="chip" {{ $ad->chip == true ? 'checked' : '' }}><label for="chip">Čipiranje</label>
                            </div>

                            <div class="cell small-12" style="padding-top:2em;">
                                <input type="submit" value="Ažuriraj oglas" class="button">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('partials.errors')
    @endsection
