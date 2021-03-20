<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Index resource
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $products = Product::all();

        return response()->json([
            'data' => $products
        ]);
    }

    /**
     * Get single resource
     *
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( Product $product ) {
        return response()->json([
            'data' => $product
        ]);
    }

    /**
     * Update single resource
     *
     * @param ProductStoreRequest $request
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ProductStoreRequest $request, Product $product ) {
        $product->fill($request->all());
        $product->save();

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Store new resource
     *
     * @param ProductStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductStoreRequest $request ) {
        $product = new Product;
        $product->fill($request->all());
        $product->save();

        return response()->json([
            'status' => true,
            'created' => true,
            'data' => [
                'id' => $product->id
            ]
        ]);
    }

    /**
     * Destroy single resource
     *
     * @param Product $product
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Product $product ) {
        $product->delete();

        return response()->json([
            'status' => true
        ]);
    }

    /**
     * Destroy resources by ids
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroyMass( Request $request ) {
        $request->validate([
            'ids' => 'required|array'
        ]);

        Product::destroy($request->ids);

        return response()->json([
            'status' => true
        ]);
    }
}
