<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetsHistory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAssetsHistoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('assets_history_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:assets_histories,id',
        ];
    }
}
