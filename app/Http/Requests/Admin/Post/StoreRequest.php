<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:10500',
            'preview_image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2040',
            'main_image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2040',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле обязательно для заполнения',
            'title.max' => 'Максимальная длинна поля состоявляет 255 символов',
            'content.required' => 'Это поле обязательно для заполнения',
            'content.max' => 'Максимальная длинна поля состоявляет 10500 символов',
            'preview_image.required' => 'Наличие изображения обязательно',
            'preview_image.mimes' => 'Допустимые форматы изображений: jpeg, png, jpg, gif',
            'preview_image.max' => 'Максимальный размер изображения составляет 2 мегабайта',
            'main_image.required' => 'Наличие изображения обязательно',
            'main_image.mimes' => 'Допустимые форматы изображений: jpeg, png, jpg, gif',
            'main_image.max' => 'Максимальный размер изображения составляет 2 мегабайта',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.exists' => 'Указанная категория не существует',
            'tag_ids.*.exists' => 'Указанный тег не существует',
        ];
    }
}
