<?php

namespace App\Service;

use App\Models\Post;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class PostService
{
    public function store($data): void
    {
        DB::beginTransaction();
        try {
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            //Modify preview_image and store to database
            $requestPreviewImagePath = $data['preview_image']->getRealPath() . '.jpg';
            $interventionPreviewImage = Image::make($data['preview_image'])->resize(600,500)->encode('jpg');
            $interventionPreviewImage->save($requestPreviewImagePath);
            $data['preview_image'] = Storage::disk('public')->put('/images', new File($requestPreviewImagePath));

            //Modify main_image and store to database
            $requestMainImagePath = $data['main_image']->getRealPath() . '.jpg';
            $interventionMainImage = Image::make($data['main_image'])->resize(1280,720)->encode('jpg');
            $interventionMainImage->save($requestMainImagePath);
            $data['main_image'] = Storage::disk('public')->put('/images', new File($requestMainImagePath));

            $data['user_id'] = auth()->user()->id;
            $post = Post::firstOrCreate($data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            abort(500);
        }
    }

    public function update($data, $post): Post
    {
        DB::beginTransaction();
        try {
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            abort(500);
        }

        return $post;
    }
}
