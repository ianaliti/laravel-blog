<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post) {
        if (auth()->user()->id === $post['user_id']) {
            $post->delete();
        }
        return redirect('/userhome');
    }

    public function updatePost(Post $post, Request $request) {
        if (auth()->user()->id === $post['user_id']) {
            $incomingFields = $request->validate([
                'title'=> 'required',
                'body' => 'required'
            ]);
    
            $incomingFields['title'] = strip_tags($incomingFields['title']);
            $incomingFields['body'] = strip_tags($incomingFields['body']);
    
            $post->update($incomingFields);
        }
        return redirect('/userhome');
    }

    public function showEditPost(Post $post) {
        if (auth()->user()->id !== $post['user_id']) {
            return redirect('/userhome');
        }
        return view('edit-post', ['post' => $post]);
    }

    public function openPost($id) {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->route('home')->with('error', 'Post not found.');
        }
        
        return view('user-post', ['post' => $post]);
    }


    public function createPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $incomingFields['image'] = $imagePath; 
        }

        Post::create($incomingFields);
        return redirect('/userhome');
    }
}