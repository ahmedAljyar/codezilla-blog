<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        /*$allPosts = [
            ['id' => 1, 'title' => 'php', 'posted-by' => 'ahmed', 'created-at' => '2024/8/9'],
            ['id' => 2, 'title' => 'html', 'posted-by' => 'mahmoud', 'created-at' => '2024/8/10'],
            ['id' => 3, 'title' => 'web development', 'posted-by' => 'mohamed', 'created-at' => '2024/8/5']
        ];*/
        $allPosts = Post::all();

        return view('posts.index', ['posts' => $allPosts]);
    }

    public function show(Post $post){
        /*$post = [
            ['id' => 1, 'title' => 'php', 'posted-by' => 'ahmed', 'created-at' => '2024/8/9', 'description' => 'omak araa']
        ];*/

        //$post = Post::find($postId);

        //$post = Post::where('id', $postId)->first();

        //$post = Post::where('id', $postId)->get()[0];

        return view("posts.show", ['post' => $post]);
    }

    public function create(){
        $users = User::all();

        return view('posts.create', ['users' => $users]);
    }

    public function store(){
        # check data validation
        request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:5'],
            'post_creator' => ['required', 'exists:users,id']
        ]);
        
        # get data from user
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        # store data in db

        # first way

        /*$post = new Post;

        $post->title = $title;
        $post->description = $description;
        $post->post_creator;

        $post->save();
        */

        # second way

        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator
        ]);

        # go to index
        return to_route("posts.index");
    }

    public function edit(Post $post){
        $users = User::all();

        return view("posts.edit", ['users' => $users, 'post' => $post]);
    }

    public function update(Post $post){
        # get data
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;

        # update in db
        $post->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator
        ]);

        # go to show
        return to_route("posts.show", $post);
    }

    public function delete(Post $post){
        $post->delete();
        return to_route('posts.index');
    }
}
