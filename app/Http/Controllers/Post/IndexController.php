<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {

        try {
            $posts = Post::paginate(9);
        } catch (\Exception $exception) {
            $posts = collect([]);
        }

        try {
            $randomPosts = Post::get()->random(4);
        } catch (\Exception $exception) {
            $randomPosts = collect([]);
        }

        try {
            $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        } catch (\Exception $exception) {
            $likedPosts = collect([]);
        }

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
