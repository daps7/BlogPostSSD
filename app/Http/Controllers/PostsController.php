<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Models\Like;
use App\Models\Favorite;

class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Post::query();

        // Search functionality
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->input('search') . '%')
                  ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        }

        // Sort functionality
        if ($request->has('sort')) {
            $sortColumn = $request->input('sort');
            $sortDirection = $request->input('direction', 'asc');
            $query->orderBy($sortColumn, $sortDirection);
        } else {
            $query->orderBy('updated_at', 'DESC');
        }

        $posts = $query->get();

        return view('blog.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
    
        return view('blog.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Post::where('slug', $slug)
            ->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);

        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }

    public function like($id)
    {
        $post = Post::findOrFail($id);

        // Check if the user has already liked the post
        $existingLike = Like::where('post_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($existingLike) {
            // Unlike the post
            $existingLike->delete();
            $likesCount = Like::where('post_id', $post->id)->count();
            return response()->json(['likes' => $likesCount, 'liked' => false]);
        }

        // Create a new like entry
        Like::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
        ]);

        // Get the updated likes count
        $likesCount = Like::where('post_id', $post->id)->count();
        return response()->json(['likes' => $likesCount, 'liked' => true]);
    }

    public function favorite(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        // Check if the user has already favorited the post
        $existingFavorite = Favorite::where('post_id', $id)->where('user_id', auth()->user()->id)->first();
        if ($existingFavorite) {
            // Unfavorite the post
            $existingFavorite->delete();
            return response()->json(['favorited' => false]);
        }

        // Create a new favorite entry
        Favorite::create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(['favorited' => true]);
    }
}

