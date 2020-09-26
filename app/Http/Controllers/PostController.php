<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'article' => 'required|max:1300',
            ]);
            
            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $req->input('title');
            $post->description = $req->input('description');
            $post->article = $req->input('article');
            $post->save();
            
            return redirect('/post');
    }

    public function update($id,Request $req)
    {
        $post = Post::where('id','=',$id)->firstOrFail();

        request()->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'article' => 'required|max:1300',
            ]);
            
            $post->title = $req->input('title');
            $post->description = $req->input('description');
            $post->article = $req->input('article');
            $post->save();
            
            return redirect('/post/'.$post->id);
    }

    public function getAllPost(){
        $posts = Post::with('user')->latest()->paginate(5);
        return view('post.index',['posts' => $posts ]);
    }

    public function getOnePost($id){
        $post = Post::where('id','=',$id)->firstOrFail();
        return view('post.post',['post' => $post]);
    }

    public function getUserPost(){
        $posts = auth()->user()->posts;
        return view('user.post',['posts' => $posts]);
    }

    public function updatePost($id){
        $post = Post::where('id','=',$id)->firstOrFail();
        if($post->user_id != auth()->user()->id && !auth()->user()->hasRole('MODERATOR')){
            abort(403);
        }
        return view('post.update',['post' => $post]);
    }

    public function delete($id){
        $post = Post::where('id','=',$id)->firstOrFail();
        if($post->user_id != auth()->user()->id && !auth()->user()->hasRole('ADMIN')){
            abort(403);
        }
        $post->delete();
        return redirect('/post');
    }
}
