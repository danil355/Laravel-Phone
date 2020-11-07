<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhoneFormRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'color' => 'required',
            'price' => 'required|max:255'
        ];
    }
}
