<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $sortBy = "created_at";
        $orderBy = "desc";
        $perPage = "10"; // pagination parameter
        $search_query = null; // search query

        if($request->has('sortBy')) $sortBy = $request->query('sortBy');
        if($request->has('orderBy')) $orderBy = $request->query('orderBy');
        if($request->has('perPage')) $perPage = $request->query('perPage');

        if($request->has('searchQuery')) {
            $search_query = $request->query('searchQuery');
            $posts = Post::where('name', 'LIKE', "%{$search_query}%")->get();
        } else{
            $posts = Post::all()->sortByDesc($sortBy);
        }

        return view('posts.index', compact('posts', 'search_query'));
    }

    public function getpost(Request $request)
    {
        $sortBy = "created_at"; // default sort key
        if($request->has('sortBy')) $sortBy = $request->query('sortBy');

//        if($sortBy == "name"){
//            $posts = Post::all()->sortBy($sortBy);
//        } else {
//            $posts = Post::all()->sortByDesc($sortBy);
//        }

        $posts = Post::all()->sortByDesc($sortBy);

//        return response()->json([
//
//            'post'=>$posts
//
//        ]);
        return view('posts.index', compact('posts'));

    }


    //
    public function create()
    {
        return view('posts/create');
    }

    //
    public function store()
    {
        $data = request()->validate([
           'name' => 'required',
           'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'name' => $data['name'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/'.auth()->user()->id);

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post)
    {
        $this->authorize('update', $post);
        $data = request()->validate([
            'name' => 'required',
            'image' => '',
        ]);

        auth()->user()->posts()->where("id", $post->id)->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/posts/{$post->id}");;
    }

}

