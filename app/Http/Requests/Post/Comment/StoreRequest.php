<?php

namespace App\Http\Requests\Post\Comment;

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
            'message' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'message.string' => 'Введенные данные не явлются текстом',
            'message.max' => 'Максимальная длина поля 255 символов',
            'message.required' => 'Данное поле необходимо для заполнения',
        ];
    }
}
