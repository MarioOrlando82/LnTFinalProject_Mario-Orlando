<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Barang;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function create(){
        $categories = Category::all();
        return view('createCategory', compact('categories'));
    }

    public function store(Request $request){
        Category::create([
            'nama' => $request->name
        ]);
        return redirect('/');
    }
}
