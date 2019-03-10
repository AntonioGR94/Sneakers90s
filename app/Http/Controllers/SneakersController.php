<?php

namespace App\Http\Controllers;

use App\Sneaker;
use App\Brand;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SneakerRequest;

class SneakersController extends Controller
{

   /* public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        $this->middleware('can:touch, sneaker',[
            'only' => ['edit','update','destroy']
        ]);
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sneakers = Sneaker::with(['user'])
                    ->latest()
                    ->paginate(10);

        return view('public.sneakers.index')->withSneakers($sneakers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        return view('public.sneakers.create')->withBrands($brands);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SneakerRequest $request)
    {
        $cover = $request->file('cover'); 
        
        Sneaker::create([
            'user_id' => $request->user()->id,
            'brand_id' => request('brand'),
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'release' => request('release'),
            'price' => request('price'),
            'sport' => request('sport'),
            'colorway' => request('colorway'),
            'size' => request('size'),

            'cover' => ($cover?$cover->store('covers','public'):null), 


        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sneaker = Sneaker::where('slug', $slug)->firstOrFail();

        return view('public.sneakers.show', ['sneaker' => $sneaker]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function edit(Sneaker $sneaker)
    {
        $brands = Brand::all();

        return view('public.sneakers.edit', [
            'sneaker' => $sneaker,
            'brands' => $brands,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function update(SneakerRequest $request, Sneaker $sneaker)
    {
        if( $cover && $sneaker->cover  ){
            Storage::disk('public')->delete($sneaker->cover);
        }
        $sneaker->update([
          'name' => request('name'),
          'slug' => str_slug(request('name'), "-"),
          'description' => request('description'),
          'release' => request('release'),
          'price' => request('price'),
          'sport' => request('sport'),
          'colorway' => request('colorway'),
          'size' => request('size'),
          'cover' => ($cover?$cover->store('covers','public'):$sneaker->cover),

        ]);

        return redirect('/sneakers/'.$sneaker->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sneaker  $sneaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sneaker $sneaker)
    {
        if( $sneaker->cover ){
            Storage::disk('public')->delete($sneakers->cover);
        }
        $sneaker->delete();

        return redirect('/');
    }
}
