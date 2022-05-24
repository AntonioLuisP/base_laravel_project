<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostThemeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'between:2,25'],
        ];
    }
    public function messages()
    {
        return trans('validation');
    }
}
