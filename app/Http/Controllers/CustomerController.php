<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Contracts\ICustomerService;
use App\Http\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    private $customerService;

    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getCustomers();
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'customers' => $customers
            ]
        ], 200);
    }

    public function store(CustomerFormRequest $request)
    {
        $request->validated();
        if ( $this->customerService->saveCustomer($request) ) {
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
        $customer = $this->customerService->getCustomer($id);
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'customer' => $customer
            ]
        ], 200);
    }

    public function update($id, CustomerFormRequest $request)
    {
        $request->validated();
        if ( $this->customerService->updateCustomer($id, $request) ) {
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
        if ( $this->customerService->deleteCustomer($id) ) {
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
        $customers = $this->customerService->searchCustomer($critery, $value);
        return response()->json([
            'code' => 200,
            'message' => 'Petición exitosa',
            'data' => [
                'customers' => $customers
            ]
        ], 200);
    }
}
