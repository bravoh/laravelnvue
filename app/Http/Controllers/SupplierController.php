<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierStoreRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
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
        $suppliers = Supplier::all();

        return response()->json([
            'data' => $suppliers
        ]);
    }

    /**
     * Get single resource
     *
     * @param Supplier $supplier
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( Supplier $supplier ) {
        return response()->json([
            'data' => $supplier
        ]);
    }

    /**
     * Update single resource
     *
     * @param SupplierStoreRequest $request
     * @param Supplier $supplier
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(SupplierStoreRequest $request, Supplier $supplier ) {
        $supplier->fill($request->all());
        $supplier->save();

        return response()->json([
            'status' => true,
            'data' => $supplier
        ]);
    }

    /**
     * Store new resource
     *
     * @param SupplierStoreRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SupplierStoreRequest $request ) {
        $supplier = new Supplier;
        $supplier->fill($request->all());
        $supplier->save();

        return response()->json([
            'status' => true,
            'created' => true,
            'data' => [
                'id' => $supplier->id
            ]
        ]);
    }

    /**
     * Destroy single resource
     *
     * @param Supplier $supplier
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Supplier $supplier ) {
        $supplier->delete();

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

        Supplier::destroy($request->ids);

        return response()->json([
            'status' => true
        ]);
    }
}
