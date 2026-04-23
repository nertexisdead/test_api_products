<?php

namespace App\Http\Controllers\V1;

use App\Exceptions\ApiDefaultException;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\IndexRequest;
use App\Services\ProductsService;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    public function __construct(
        protected ProductsService $productsService
    ) {
    }

    public function index(IndexRequest $request): ApiDefaultException|JsonResponse
    {
        return $this->productsService->index($request);
    }
}
