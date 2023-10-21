<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\category;

class ItemController extends Controller
{
    public function index(){

        $title = '';

        if(request('category')){
            $category = category::firstWhere('slug',  request('category'));
            $title = $category->name;
        }

        else{
            $title = 'All Items';
        }

        return view('items', [
            'title' => $title,
            'items' => Item::orderBy('title')->filter(request(['search', 'category']))->paginate(12)->withQueryString()
        ]);
    }
}
