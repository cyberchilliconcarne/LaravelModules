<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_category_create');
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
