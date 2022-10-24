<?php

namespace App\Http\Requests\Task;

use App\Models\Task\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTaskRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tasks,id',
        ];
    }
}
