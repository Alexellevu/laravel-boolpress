<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'title' => 'required | max:255 | min:5',
            'image' => 'required |max:100',
            'description' => 'required', // poteva essere nullable se impostato cosi in migration.
            'date'=> 'required'
           
        ]);
             
   
        
        $cover = Storage::put('posts_images',$validatedData['image'] ); 
    
        $validatedData['image'] = $cover;

        Post::create($validatedData);
        return redirect()->route('admin.posts.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required | max:255 | min:5',
            'description' => 'required', // poteva essere nullable se impostato cosi in migration.
            'image' => 'required',
            'date' => 'required'
        ]);
        ///ddd($request->hasFile('image'));//verifica se il file è dentro la richiesta
        if(array_key_exists('image', $validatedData)){ //verifica se cè la chiave nell array
              $cover = Storage::put('posts_images',$validatedData['image'] ); 
              //ddd($cover);
              $validatedData['image'] = $cover;
        }
      
       
        $post->update($validatedData);
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
