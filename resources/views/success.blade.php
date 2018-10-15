@extends('templates.master') @section('content')
<div class="grid-container">
    <div class="grid-container">
        <div class="grid-x align-middle align-center text-center top">
            <div class="cell">
                <i class="ion-checkmark-circled" style="color: #63CE6D; font-size: 10em;"></i>
                <h1>Poruka je poslana!</h1>
                <p>Ukoliko ne dobijete odgovor u roku 48h, javite nam se u chat.</p>
            </div>

            <div class="small-12 medium-3 cell top">
                <a class="expanded button" href="/">Vrati se na početnu stranicu</a>
                <a class="expanded clear button" href="{{ url()->previous() }}">Vrati se na oglas</a>
            </div>
        </div>
    </div>
</div>

@include('partials.errors')
@include('partials.flash-message')
@endsection
