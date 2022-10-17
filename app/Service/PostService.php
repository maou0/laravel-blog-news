<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data): bool
    {
        $success = true;

        DB::beginTransaction();
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);

            DB::commit();
        } catch (\Exception $ex) {

            DB::rollback();
            $success = false;
        }

        return $success;
    }

    public function update($data, $post): ?Post
    {
        DB::beginTransaction();
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $post->update($data);
            $post->tags()->sync($tagIds);

            DB::commit();
        } catch (\Exception $ex) {

            DB::rollback();
            $post = null;
        }

        return $post;
    }
}
