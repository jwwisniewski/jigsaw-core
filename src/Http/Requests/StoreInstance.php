<?php

namespace jwwisniewski\Jigsaw\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInstance extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'module' => 'required',
            'title' => 'required|min:3',
            'url' => 'nullable|min:3',
            'keywords' => 'nullable|min:3',
            'description' => 'nullable|min:3',
        ];
    }
}
