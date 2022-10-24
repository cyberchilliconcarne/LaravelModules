<?php

namespace App\Http\Requests\Task;

use App\Models\Task\TaskTag;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskTagRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_tag_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
