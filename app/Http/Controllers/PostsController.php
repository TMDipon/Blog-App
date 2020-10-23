<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.*', 'users.name')
        ->orderBy('posts.created_at','desc')
        ->paginate(4);

        //$posts = Post::orderBy('created_at','desc')->get();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required',
            'cover_image_file' => 'image|nullable|max:1999'
        ]);

        $filenametostore = '';

        if($request->hasFile('cover_image_file'))
        {
            $file_original_name = $request->file('cover_image_file')->getClientOriginalName();
            $file_only_name = pathinfo($file_original_name,PATHINFO_FILENAME);
            $extension = $request->file('cover_image_file')->getClientOriginalExtension();
            $filenametostore = $file_only_name.'_'.time().'_'.$extension;
            $path = $request->file('cover_image_file')->storeAs('public/cover_images', $filenametostore);
        }
        else
        {
            $filenametostore = 'no_image.jpg';
        }

        $p = new Post;
        $p->title = $request->input('title');
        $p->body = $request->input('post');
        $p->user_id = auth()->user()->id;
        $p->cover_image = $filenametostore;
        $p->save();

        return redirect('/posts')->with('success','Your post is created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id)
        {
            return redirect('/posts')->with('error','Post doesn\'t belong to you, can\'t be updated');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'post' => 'required',
            'cover_image_file' => 'image|nullable|max:1999'
        ]);

        $filenametostore = '';

        if($request->hasFile('cover_image_file'))
        {
            $file_original_name = $request->file('cover_image_file')->getClientOriginalName();
            $file_only_name = pathinfo($file_original_name,PATHINFO_FILENAME);
            $extension = $request->file('cover_image_file')->getClientOriginalExtension();
            $filenametostore = $file_only_name.'_'.time().'_'.$extension;
            $path = $request->file('cover_image_file')->storeAs('public/cover_images', $filenametostore);
        }

        $p = Post::find($id);
        $p->title = $request->input('title');
        $p->body = $request->input('post');
        if($request->hasFile('cover_image_file'))
        {
            Storage::delete('public/cover_images/'.$p->cover_image);
            $p->cover_image = $filenametostore;
        }
        $p->save();

        return redirect('/posts')->with('success','Your post is edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p = Post::find($id);

        if(auth()->user()->id !== $p->user_id)
        {
            return redirect('/posts')->with('error','Post doesn\'t belong to you, deletion not possible');
        }

        if($p->cover_image != 'no_image.jpg')
        {
            Storage::delete('public/cover_images/'.$p->cover_image);
        }
        $p->delete();

        return redirect('/posts')->with('success','Post deleted successfully');
    }
}
