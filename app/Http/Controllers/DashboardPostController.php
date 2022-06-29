<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        return view('dashboard.posts.index', [
            'posts' => Post::Where('user_id', auth()->user()->id)
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
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
        // return $request->file('image')
        //     ->store('post-images');

        $data = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            // ini untuk maximal sizenya imagenya
            'image' => 'image|file|max:5024',
            'body' => 'required'
        ]);

        if ($request->file('image')) {
            $data['image'] = $request->file('image')
                ->store('post-images');
        }
        
        // ini untuk user
        $data['user_id'] = Auth()->user()->id;
        $data['excerpt'] = str::limit(strip_tags($request->body, 200));

        Post::create($data);

        return redirect('/dashboard/posts')->with('Success', 'New Post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', [
            'post' => $post,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:5024',
            'body' => 'required'
        ];

        if($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
        
        // ini validasi
        $data = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')
                ->store('post-images');
        }

        Post::where('id', $post->id)
            ->update($data);

        $data['user_id'] = Auth()->user()->id;
        $data['excerpt'] = str::limit(strip_tags($request->body, 200));
    
        return redirect('/dashboard/posts')->with('Success', ' Post has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         
            if ($post->image) {
                Storage::delete($post->image);
            }
        

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('Success', 'Post has been Delete!');
    }
}
