<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests\Admin\Search\SearchRequest;
use App\Models\Category;

class CategorySearchController
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $search = $data['search'];
        $categories = Category::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        return view('admin.search.category', compact('categories'));
    }
}
