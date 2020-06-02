@extends('template')

@section('titrePage')
    Liste des Films
@endsection

@section('titreItem')
    <h1>Tous les films :</h1>
@endsection

@section('contenu')

    @if(session()->has('info'))
        <div class="card text-white bg-success mb-3" style="max-width: 26rem;">
            <div class="card-body">
                <p class="card-text">{{ session('info') }}</p>
            </div>
        </div>
    @endif

    <div class="card">
        <header class="card-header">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('films.index') }}" @unless($currentCategorieLibelle) selected @endunless> Toutes catégories </option>
                @foreach($categories as $cat)
                    <option value="{{ route('films.categorie', $cat->libelle) }}" @if($cat->libelle == $currentCategorieLibelle) selected @endif>{{ $cat->libelle }} </option>
                @endforeach
            </select>
            <a class="btn btn-primary" href="{{ route('films.create') }}">Créer un film</a>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Catégorie</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($films as $film)
                        <tr>
                            <td><strong>{{ $film->titre}}</strong>  </td>
                            <td> {{ $film->categorie->libelle}}</td>
                            <td><a class="btn btn-primary" href="{{ route('films.show', $film->id) }}">Voir</a></td>
                            <td><a class="btn btn-warning" href="{{ route('films.edit', $film->id) }}">Modifier</a></td>
                            <td>
                                <form action="{{ route('films.destroy', $film->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
