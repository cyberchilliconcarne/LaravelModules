<?php

namespace App\Http\Requests\Task;

use App\Models\Task\TaskStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_status_create');
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
