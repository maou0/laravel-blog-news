<?php

namespace App\Http\Requests\Admin\Search;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search' => ['string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'search.max' => 'Максимальная длина поля 255 символов',
            'search.string' => 'Недопустимый формат для поиска',
        ];
    }
}
