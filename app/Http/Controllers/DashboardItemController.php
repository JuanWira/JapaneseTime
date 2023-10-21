<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.items.index', [
            'items' => Item::orderBy('category_id')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.items.create', [
            'categories' => category::orderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'category_id' => 'required',
            'image' => 'required|image|file|max:5000',
            'title' => 'required',
            'slug' => 'unique:items',
            'price' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('item-images');
        }
        Item::create($validatedData);
        return redirect('/dashboard/items')->with('success', 'New item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('dashboard.items.show', [
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('dashboard.items.edit', [
            'item' => $item,
            'categories' => category::orderBy('name')->get()
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $rules = [
            'category_id' => 'required',
            'image' => 'image|file|max:5000',
            'title' => 'required',
            'price' => 'required'
        ];

        if($request->slug != $item->slug){
            $rules['slug'] = 'unique:items';
        }
        
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('item-images');
        }
        
        Item::where('id', $item->id)
            ->update($validatedData);
        return redirect('/dashboard/items')->with('success', 'Item has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item->image){
            Storage::delete($item->image);
        }

        Item::destroy($item->id);
        return redirect('/dashboard/items')->with('success', 'Item has been deleted');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Item::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
