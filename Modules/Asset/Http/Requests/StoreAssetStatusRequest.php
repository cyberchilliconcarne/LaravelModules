<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_status_create');
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
