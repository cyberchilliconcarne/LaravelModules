<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetCategory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asset_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asset_categories,id',
        ];
    }
}
