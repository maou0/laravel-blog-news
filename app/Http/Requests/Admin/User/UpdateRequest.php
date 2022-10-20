<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user_id)],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'role' => ['required', 'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Данное поле необходимо для заполнения',
            'name.max' => 'Длина имени не должна превышать 255 символов',
            'email.required' => 'Данное поле необходимо для заполнения',
            'email.max' => 'Email не должен превышать 255 символов',
            'email.unique' => 'Данный email уже занят',
        ];
    }
}
