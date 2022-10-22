<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests\Admin\Search\SearchRequest;
use App\Models\Tag;

class TagSearchController
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $search = $data['search'];
        $tags = Tag::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        return view('admin.search.tag', compact('tags'));
    }
}
