<?php

namespace App\Http\Controllers\api;

use App\Exceptions\NotFoundException;
use App\Http\Resources\ProductResources\ProductStandardResource;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ProductController extends BaseController
{

    protected ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    public function index(): JsonResponse
    {
        $products = $this->productService->findAll();
        return $this->sendResponse(ProductStandardResource::collection($products), 'Products retrieved successfully.');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
        $product = $this->productService->createProduct($input);
        return $this->sendResponse(new ProductStandardResource($product), 'Product created successfully.');
    }

    /**
     * @throws NotFoundException
     */
    public function show($id): JsonResponse
    {
        $product = $this->productService->findProductById($id);
        return $this->sendResponse(new ProductStandardResource($product), 'Product retrieved successfully.');
    }

    /**
     * @throws ValidationException
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $input = $request->all();
        $this->productService->updateProduct($input, $product);
        return $this->sendResponse(new ProductStandardResource($product), 'Product updated successfully.');
    }

    /**
     * @throws NotFoundException
     */
    public function destroy($id): JsonResponse
    {
        $deletedStudent = $this->productService->deleteProduct($id);
        return $this->sendResponse($deletedStudent, 'Product deleted successfully.');
    }

    public function addProductsGroup(Request $request): JsonResponse
    {
        $products=$request->all();
        return $this->sendResponse($products,'group with products created successfully');
    }
}
