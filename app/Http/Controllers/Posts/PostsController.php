<?php

namespace App\Http\Controllers\Posts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Auth;
use App\Tag;

class PostsController extends Controller
{   
    const MAX_POSTS = 10; // inside the class works
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query Post model for all posts
        $posts = Post::latest()->with('user')->with('category')->paginate(self::MAX_POSTS);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $cats = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('blog.create', compact('cats', 'tags')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'category_id' => 'required|string',
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

       /* $post = new Post();
        $post->title = $valid['title'];
        $post->slug = str_slug($valid['title']);
        $post->body = $valid['body'];
        $post->save(); **/

        $valid['slug'] = str_slug($valid['title']);


        $valid['user_id'] = Auth::user()->id;

        $post = Post::create($valid);

        if(count(request('tags'))){
            $post->tags()->attach(request('tags'));
        }

        return redirect('/posts')->with('success', 'Post was added!'); // with means return with this method
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('blog.show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Post $post)
    {   

        $cats = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('blog.edit', compact('post', 'cats', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {     
          $valid = $request->validate([
            'id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'body' => 'required|string'
        ]);

          $post = Post::find($valid['id']);
          $post->category_id = $valid['category_id'];
          $post->title = $valid['title'];
          $post->body = $valid['body'];
          



          $post->save();

        if(count(request('tags'))){
            $post->tags()->sync(request('tags'));
        }

        return redirect('/posts/' . $post->slug)->with('success', 'Post was updated');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecomments(Request $request)
    {
        $valid = $request->validate([
            'body' => 'required|string'
        ]);

        $comment = Comment::create($valid);

        return redirect('/posts/{{ $post->slug }}')->with('success', 'Comment was successfully added!'); // with means return with this method
    }

    public function showcomments($comment)
    {
        $comment = Post::where('slug', '=', $post->slug)->first();
        return view('/posts/{{ $post->slug }}', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()) {
            return back()->with('success', 'Post was deleted');
        }

         return back()->with('error', 'There was a problem deleting that post');

    } 
        
}
