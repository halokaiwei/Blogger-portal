<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Admin;

class PostController extends Controller
{


    public function createPost(Request $request)
    {
        
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);

        $date = now(); // Current timestamp

        $post = new Post;
        $post->date_time = $date;
        $post->subject = $request->subject;
        $post->post = $request->content;
        if (session('user')) {
            // Assuming the user's name is stored in the 'name' field
            $post->posted_by = session('user')->name;
        } elseif (session('admin')) {
            // Assuming the admin's name is stored in the 'username' field
            $post->posted_by = 'admin';
        }
        $post->save();

        return redirect('/viewPosts');
    }
    public function viewPosts()
    {
        $posts = Post::all(); // Retrieve all posts from the database
        return view('view_posts', compact('posts'));
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        
        if (!$post) {
            return 'Post not found!';
        }
        
        $post->delete();
        
        return redirect('viewPosts')->with('post', $post);
    }
    public function editPost($id)
    {
        // Retrieve the post from the database
        $post = Post::find($id);

        // Check if the post exists
        if (!$post) {
            return 'Post not found';
        }

        return view('edit_post')->with('post',$post);
    }

    public function updatePost(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required',
            'subject' => 'required',
            'content' => 'required',
        ]);

        // Find the post by ID
        $post = Post::find($request->id);

        // Update the post with new data    
        $post->subject = $request->subject;
        $post->post = $request->content;
        $post->save();

        // Redirect back to the view posts page with success message
        return redirect('/viewPosts')->with('success', 'Post updated successfully');
    }
}
