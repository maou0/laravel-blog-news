<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'string', 'max:255', Rule::unique('tags')->withoutTrashed()],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Данное поля необходимо для заполнения',
            'title.max' => 'Максимальная длина поля 255 символов',
            'title.unique' => 'Данный тег уже существует',
        ];
    }
}
