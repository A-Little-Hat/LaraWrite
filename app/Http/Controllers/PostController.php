<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;


use Illuminate\Http\Request;


class PostController extends Controller
{
    public function viewPost($name){
        // Retrieve the post from the database by its ID
        $posts = Post::where('author', $name)->get();
        $user = Auth::user(); 

        // Pass the post data to the view for rendering
        return view('post', ['posts' => $posts, 'display' => $name==$user->name]);
    }

    public function viewAllPost(){
        $user = Auth::user();
        // Fetch all posts from the database
        $posts = Post::all();
        // $user = Auth::user(); 
        $likes = Like::select('post_id')->where('user_id',$user->id)->get();
        // Pass the posts data to the view for rendering
        return view('allpost', ['posts' => $posts, 'likes'=> $likes, 'auth'=> $user ]);
    }

    public function addPost(Request $request){
        $user = Auth::user(); 
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post instance
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $user->name;
        $post->content = $request->input('content');
        $post->like_count = 0;
        $post->save();

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'Post added successfully!');
    
    }

    public function updatePostData($postid){
        return view('updatepost',["postid"=>$postid]);
    }

    public function updatePost($postid, Request $req){
        $user = Auth::user(); 
        $req->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        if(Post::where('id', $postid)->get()[0]['author'] == $user->name){
            Post::where('id', $postid)
                  ->update(['title' => $req->title, 'content' => $req->content]);
    
            return redirect('/post/username/'.$user->name);
            // $posts = Post::where('author', $user->name)->get();
            // return view('post', ['posts' => $posts, 'display' => true]);
        }else{
            return "invalid access";
        }
    }

    public function deletePost($postid){
        $user = Auth::user(); 
        Post::where('id', $postid)->delete();
        $posts = Post::where('author', $user->name)->get();
        return view('post', ['posts' => $posts, 'display' => true]);
    }

    // public function allUser(){
    //     $user = Auth::user();
    //     $allUser = User::whereNotIn('id',$user->id)->get();
    // }

    public function demo(){
        return view('temp');
    }
}
