<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.category.index', [
            'categories' => category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.category.create');
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
            
            'image' => 'required|image|file|max:5000',
            'name' => 'required',
            'slug' => 'unique:items',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('item-images');
        }
        category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('dashboard.category.show', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        return view('dashboard.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $rules = [
            'image' => 'image|file|max:5000',
            'name' => 'required',
        ];

        if($request->slug != $category->slug){
            $rules['slug'] = 'unique:categories';
        }
        
        $validatedData = $request->validate($rules);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('item-images');
        }
        
        category::where('id', $category->id)
            ->update($validatedData);
        return redirect('/dashboard/categories')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        if($category->image){
            Storage::delete($category->image);
        }
        if($category->items){
            foreach($category->items as $item){
                Storage::delete($item->image);
            }
        }

        category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }
}
