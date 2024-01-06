<?php

namespace Src\Suppliers\Controllers;

use App\Http\Controllers\Controller;
use Src\Suppliers\Services\Contracts\ISupplierService;
use Src\Suppliers\Requests\SupplierFormRequest;

class SupplierController extends Controller
{
    private $supplierService;

    public function __construct(ISupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->getSuppliers();
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'suppliers' => $suppliers
            ]
        ], 200);
    }

    public function store(SupplierFormRequest $request)
    {
        $request->validated();
        if ( $this->supplierService->saveSupplier($request) ) {
            return response()->json([
                'code' => 201,
                'message' => 'Petición exitosa'
            ], 201);
        }

        return response()->json([
            'code' => 404,
            'message' => 'Petición erronea'
        ], 404);
    }

    public function show($id)
    {
        $supplier = $this->supplierService->getSupplier($id);
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'supplier' => $supplier
            ]
        ], 200);
    }

    public function update($id, SupplierFormRequest $request)
    {
        $request->validated();
        if ( $this->supplierService->updateSupplier($id, $request) ) {
            return response()->json([
                'code' => 200,
                'message' => 'Petición exitosa'
            ], 200);
        }

        return response()->json([
            'code' => 404,
            'message' => 'Petición erronea'
        ], 404);
    }

    public function destroy($id)
    {
        if ( $this->supplierService->deleteSupplier($id) ) {
            return response()->json([
                'code' => 200,
                'message' => 'Petición exitosa'
            ], 200);
        }

        return response()->json([
            'code' => 404,
            'message' => 'Petición erronea'
        ], 404);
    }

    public function search($critery, $value)
    {
        $suppliers = $this->supplierService->searchSupplier($critery, $value);
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'suppliers' => $suppliers
            ]
        ], 200);
    }
}
