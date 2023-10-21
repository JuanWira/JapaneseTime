<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function index(){

        return view('categories', [
            'title' => 'Collection',
            'categories' => category::orderBy('name')->filter(request(['searchCategory']))->paginate(12)->withQueryString()
        ]);
    }
}
