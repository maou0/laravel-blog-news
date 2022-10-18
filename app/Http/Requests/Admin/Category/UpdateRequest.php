<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255', Rule::unique('categories')->withoutTrashed()],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Данное поле необходимо для заполнения',
            'title.max' => 'Максимальная длина поля 255 символов',
            'title.unique' => 'Данная категория уже существует',
        ];
    }
}
