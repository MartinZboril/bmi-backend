<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBodyMassIndex;
use App\Http\Requests\UpdateBodyMassIndex;
use App\Http\Resources\BodyMassIndexResource;
use App\Models\BodyMassIndex;

class BodyMassIndexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BodyMassIndexResource::collection(BodyMassIndex::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBodyMassIndex $request)
    {
        $bodyMassIndex = BodyMassIndex::create($request->validated());

        return BodyMassIndexResource::make($bodyMassIndex);
    }

    /**
     * Display the specified resource.
     */
    public function show(BodyMassIndex $bodyMassIndex)
    {
        return BodyMassIndexResource::make($bodyMassIndex);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBodyMassIndex $request, BodyMassIndex $bodyMassIndex)
    {
        $bodyMassIndex->update($request->validated());

        return BodyMassIndexResource::make($bodyMassIndex);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BodyMassIndex $bodyMassIndex)
    {
        $bodyMassIndex->delete();

        return response()->noContent();
    }
}
