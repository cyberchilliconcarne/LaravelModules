<?php

namespace App\Http\Requests\User;

use App\Models\User\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permission_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
