<?php

namespace Modules\Asset\Http\Requests;

use Modules\Asset\Entities\AssetsHistory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetsHistoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assets_history_edit');
    }

    public function rules()
    {
        return [];
    }
}
