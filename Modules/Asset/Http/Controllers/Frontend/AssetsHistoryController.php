<?php

namespace Modules\Asset\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Asset\Entities\AssetsHistory;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetsHistoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assets_history_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetsHistories = AssetsHistory::with(['asset', 'status', 'location', 'assigned_user'])->get();

        return view('asset::frontend.assetsHistories.index', compact('assetsHistories'));
    }
}
