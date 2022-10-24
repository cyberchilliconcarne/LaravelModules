<?php

namespace App\Http\Requests\Crm;

use App\Models\Crm\CrmStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCrmStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crm_status_create');
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
