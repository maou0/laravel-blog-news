<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests\Admin\Search\SearchRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostSearchController
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $search = $data['search'];
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('content', 'LIKE', "%{$search}%")
            ->get();

        return view('admin.search.post', compact('posts'));
    }
}
