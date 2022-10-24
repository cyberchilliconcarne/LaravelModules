<?php

namespace Modules\Asset\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\Asset\Http\Requests\MassDestroyAssetLocationRequest;
use Modules\Asset\Http\Requests\StoreAssetLocationRequest;
use Modules\Asset\Http\Requests\UpdateAssetLocationRequest;
use Modules\Asset\Entities\AssetLocation;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetLocationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetLocations = AssetLocation::all();

        return view('asset::frontend.assetLocations.index', compact('assetLocations'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetLocations.create');
    }

    public function store(StoreAssetLocationRequest $request)
    {
        $assetLocation = AssetLocation::create($request->all());

        return redirect()->route('frontend.asset-locations.index');
    }

    public function edit(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetLocations.edit', compact('assetLocation'));
    }

    public function update(UpdateAssetLocationRequest $request, AssetLocation $assetLocation)
    {
        $assetLocation->update($request->all());

        return redirect()->route('frontend.asset-locations.index');
    }

    public function show(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('asset::frontend.assetLocations.show', compact('assetLocation'));
    }

    public function destroy(AssetLocation $assetLocation)
    {
        abort_if(Gate::denies('asset_location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetLocation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetLocationRequest $request)
    {
        AssetLocation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
