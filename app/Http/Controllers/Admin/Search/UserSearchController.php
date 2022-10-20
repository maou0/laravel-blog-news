<?php

namespace App\Http\Controllers\Admin\Search;

use App\Http\Requests\Admin\Search\SearchRequest;
use App\Models\User;

class UserSearchController
{
    public function __invoke(SearchRequest $request)
    {
        $data = $request->validated();

        $search = $data['search'];
        $roles = User::getRoles();
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->get();

        return view('admin.search.user', compact('users', 'roles'));
    }
}
