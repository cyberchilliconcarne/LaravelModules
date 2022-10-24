<?php

namespace App\Http\Requests\Task;

use App\Models\Task\TaskStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTaskStatusRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('task_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:task_statuses,id',
        ];
    }
}
