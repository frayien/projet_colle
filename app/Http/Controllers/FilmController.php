<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Categorie;
use App\Models\Film;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function GuzzleHttp\Promise\all;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($currentCategorieLibelle = null)
    {
        $query = $currentCategorieLibelle ? Categorie::where('libelle',"$currentCategorieLibelle")->firstOrFail()->films() : Film::query();
        $films = $query->get();
        $categories = Categorie::all();
        return view('listeFilms',compact('films', 'currentCategorieLibelle', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::pluck('libelle','id');
        return view('creerFilm',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FilmRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilmRequest $request)
    {
        Film::create($request->all());
        return redirect()->route('films.index')->with('info','Le film a été créé.');
    }

    /**
     * Display the specified resource.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('afficherFilm',compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        $categories = Categorie::pluck('libelle','id');
        return view('modifierFilm',compact('film','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Film $film
     * @return \Illuminate\Http\Response
     */
    public function update(FilmRequest $request, Film $film)
    {
        $film->update($request->all());
        return redirect()->route('films.index')->with('info','Les modifications on été enregistées.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return back()->with('info','Le film a bien été supprimé de la base de données.');
    }
}
