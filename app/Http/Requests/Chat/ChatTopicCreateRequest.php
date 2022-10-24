<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;

class ChatTopicCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'recipient' => 'required',
            'subject'   => 'required',
            'content'   => 'required',
        ];
    }
}
