<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\Asset;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_edit');
    }

    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'integer',
            ],
            'serial_number' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'photos' => [
                'array',
            ],
            'status_id' => [
                'required',
                'integer',
            ],
            'location_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
