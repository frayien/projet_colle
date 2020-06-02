@extends('template')

@section('titrePage')
    Information sur le film
@endsection

@section('contenu')
    <div class="card">
        <header class="card-header">
            <h5 class="card-header-title">Titre : {{ $film->titre }}</h5>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Année de sortie : {{ $film->anneeSortie }}</p>
                <p>Catégorie : {{ $film->categorie->libelle }}</p>
                <p>Description : {{ $film->description }}</p>
            </div>
        </div>
    </div>
@endsection
