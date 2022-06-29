<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;



class PostController extends Controller
{
    public function index() 
    {
        // dd(request('search'));

        $title = '';
        if(request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = " in " . $category->name;
        } elseif (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = " by " . $author->name;
        }
        

        
        
        // $posts = ;
        return view('posts', [
            // POST::ALL() ITU UNTUK MENGAMBIL SEMUA BLOG POST DARI DB. DARI DATABSE YANG ID
            // SEDANGKAN POST::LATEST()->GET UNTUK MENGAMBIL DATA POST YANG terkahir SAMPAI TERLAMA
            "title" => "All Post" . $title,
            // "posts" => Post::all()
            "active" => 'posts',
            // Yang ini versi lama dan bisa dibilang kecepatan applikasi kita bakalan menjadi lebi lambat oleh karena itu
            // "posts" => Post::latest()->get()

            // KITA MENAMBAHKAN WITH ARRAY DAN MENAMBAHKAN MULTIPLAY RELASTION EAGER LOADING
            "posts" => Post::latest()->filter(request(['search', 'category', 'author']))
            // paginate->withquerystring itu untuk page halaman misal page buat 7 content maka akan dibuat 7 content dari 20 halaman 
                ->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "sigle post",
            "active" => 'posts',
            "post" => $post
        ]);
    }
}
