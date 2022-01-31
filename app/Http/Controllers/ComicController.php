<?php

namespace App\Http\Controllers;
use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comicList = Comic::orderBy('id', 'desc')->paginate(4); //ordinati
        //dump($comicList);
        return view('comics.index', compact('comicList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'thumb' => 'required',
                'price' => 'required',
                'series' => 'required',
                'sale_date' => 'required',
                'type' => 'required',
                'slug' => 'required',
            ],
            [
                'title.required' => 'title è un campo obbligatorio',
                'description.required' => 'description è un campo obbligatorio',
                'thumb.required' => 'thumb è un campo obbligatorio',
                'price.required' => 'price è un campo obbligatorio',
                'series.required' => 'series è un campo obbligatorio',
                'sale_date.required' => 'sale date è un campo obbligatorio',
                'type.required' => 'type è un campo obbligatorio',
                'slug.required' => 'slug è un campo obbligatorio',
            ],
        );

        $new_comic = new Comic();

        $new_comic->fill($data);

        $new_comic->save();


        return redirect()->route('comics.show', $new_comic);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);

        $comic = Comic::find($id);
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404, 'Prodotto non presente nel database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data = $request->all();
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'thumb' => 'required',
                'price' => 'required',
                'series' => 'required',
                'sale_date' => 'required',
                'type' => 'required',
                'slug' => 'required',
            ],
            [
                'title.required' => 'title è un campo obbligatorio',
                'description.required' => 'description è un campo obbligatorio',
                'thumb.required' => 'thumb è un campo obbligatorio',
                'price.required' => 'price è un campo obbligatorio',
                'series.required' => 'series è un campo obbligatorio',
                'sale_date.required' => 'sale date è un campo obbligatorio',
                'type.required' => 'type è un campo obbligatorio',
                'slug.required' => 'slug è un campo obbligatorio',
            ],
        );
        $data['slug'] = $this->createSlug($data['title']);
        $comic->update($data);

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index')->with("deleted", "Il fumetto \" $comic->title  \" è stato eliminato con successo.");
    }

    private function createSlug($string){
        return  Str::slug($string,'-');
    }
}
