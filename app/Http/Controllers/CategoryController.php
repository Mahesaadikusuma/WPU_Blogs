<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('categories', [
            'title' => 'Post Categories',
            'categories' => Category::all(),
            "active" => 'categories',
        ]);    
    }

    public function show(Category $category)
    {
        return view('posts', [
            'title' => "Post By Category :  $category->name",
            'posts' => $category->posts->load('category', 'author'),
            "active" => 'categories',
            
        ]);
    }
}
