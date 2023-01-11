<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $req = $request->all();
        if(isset($req['id'])) {
            $categories = Category::where('id', (int)$req['id'])->with('childrenCategories')->get();
        } else {
            $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        }
        return view('category.index', compact('categories'));
    }

}
