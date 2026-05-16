<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUrlRequest;
use App\Services\Slug\UrlCreateService;

class UrlController extends Controller
{
    public function store(StoreUrlRequest $request, UrlCreateService $urlCreateService)
    {
        $url = $urlCreateService->createUrl($request->validated());

        return response()->json([
            'message' => 'Short url created succefully',
            'data' => $url
        ], 201);
    }
}
