<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string'],
            'id_cuser' => ['required', 'exists:users,id'],

        ];
    }
    public function messages()
    {
        return trans('validation');
    }
}
