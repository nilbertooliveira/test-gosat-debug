<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestApi;
use App\Http\Resources\TestApiResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * This is summary.
 *
 * This is a description. In can be as large as needed and contain `markdown`.
 */
class TestApi extends Controller
{
    /**
     * This is summary.
     *
     * This is a description. In can be as large as needed and contain `markdown`.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(['success' => true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTestApi $request
     * @return TestApiResource
     * @response TestApiResource
     */
    public function store(StoreTestApi $request): TestApiResource
    {
        return new TestApiResource($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(['success' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id)
    {
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json(['success' => true]);
    }
}
