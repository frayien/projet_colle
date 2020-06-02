@extends('template')

@section('contenu')
    @isset($film)
        {!! Form::open(['url'=> route('films.update', $film->id)]) !!}
        @method('PUT')
    @else
        {!! Form::open(['url'=> route('films.store')]) !!}
    @endisset

    <div class="form-group {!! $errors->has('titre') ? 'has-error' : '' !!}">
        {!! Form::label('titre', 'Titre') !!}
        {!! Form::text('titre', $film->titre ?? null, ['class' => 'form-control']) !!}
        {!! $errors->first('titre','<small class="help-block text-danger">Le titre ne peut pas être vide.</small>') !!}
    </div>
    <div class="form-group {!! $errors->has('anneeSortie') ? 'has-error' : '' !!}">
        {!! Form::label('anneeSortie', 'Année de sortie') !!}
        {!! Form::number('anneeSortie', $film->anneeSortie ?? null, ['class' => 'form-control']) !!}
        {!! $errors->first('anneeSortie','<small class="help-block text-danger">L\'année de sortie ne peut pas être vide.</small>') !!}
    </div>
    <div class="form-group {!! $errors->has('categorie_id') ? 'has-error' : '' !!}">
        {!! Form::label('categorie_id', 'Catégorie') !!}
        {!! Form::select('categorie_id', $categories, $film->categorie->id ?? null, ['class' => 'form-control']) !!}
        {!! $errors->first('categorie_id','<small class="help-block text-danger">Un catégorie doit être sélectionnée.</small>') !!}
    </div>
    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', $film->description ?? null, ['class' => 'form-control', 'rows' => 3]) !!}
        {!! $errors->first('description','<small class="help-block text-danger">La description ne peut pas être vide.</small>') !!}
    </div>
    {!! Form::submit('Enregister',['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
