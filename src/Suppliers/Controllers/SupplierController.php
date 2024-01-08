<?php

namespace Src\Suppliers\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\RespondsWithHttpStatus;
use Src\Suppliers\Services\Contracts\ISupplierService;
use Src\Suppliers\Requests\SupplierFormRequest;

class SupplierController extends Controller
{
    use RespondsWithHttpStatus;

    private $supplierService;

    public function __construct(ISupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index()
    {
        $suppliers = $this->supplierService->getSuppliers();
        return $this->responseWithData(200, 'Petición éxitosa', $suppliers);
    }

    public function store(SupplierFormRequest $request)
    {
        if ($this->supplierService->saveSupplier($request))
            return $this->response(201, 'Petición éxitosa');
        return $this->response(404, 'Peticion erronea');
    }

    public function show($id)
    {
        $supplier = $this->supplierService->getSupplier($id);
        return $this->responseWithData(200, 'Petición éxitosa', $supplier);
    }

    public function update($id, SupplierFormRequest $request)
    {
        if ($this->supplierService->updateSupplier($id, $request))
            return $this->response(200, 'Petición éxitosa');
        return $this->response(404, 'Peticion erronea');
    }

    public function destroy($id)
    {
        if ($this->supplierService->deleteSupplier($id))
            return $this->response(200, 'Petición éxitosa');
        return $this->response(404, 'Peticion erronea');
    }

    public function search($critery, $value)
    {
        $suppliers = $this->supplierService->searchSupplier($critery, $value);
        return $this->responseWithData(200, 'Petición éxitosa', $suppliers);
    }
}
