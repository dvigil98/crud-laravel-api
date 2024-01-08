<?php

namespace Src\Customers\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\RespondsWithHttpStatus;
use Src\Customers\Services\Contracts\ICustomerService;
use Src\Customers\Requests\CustomerFormRequest;

class CustomerController extends Controller
{
    use RespondsWithHttpStatus;

    private $customerService;

    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getCustomers();
        return $this->responseWithData(200, 'Petición éxitosa', $customers);
    }

    public function store(CustomerFormRequest $request)
    {
        if ($this->customerService->saveCustomer($request))
            return $this->response(201, 'Petición éxitosa');
        return $this->response(404, 'Petición erronea');
    }

    public function show($id)
    {
        $customer = $this->customerService->getCustomer($id);
        return $this->responseWithData(200, 'Petición éxitosa', $customer);
    }

    public function update($id, CustomerFormRequest $request)
    {
        if ($this->customerService->updateCustomer($id, $request))
            return $this->response(200, 'Petición éxitosa');
        return $this->response(404, 'Petición erronea');
    }

    public function destroy($id)
    {
        if ($this->customerService->deleteCustomer($id))
            return $this->response(200, 'Petición éxitosa');
        return $this->response(404, 'Petición erronea');
    }

    public function search($critery, $value)
    {
        $customers = $this->customerService->searchCustomer($critery, $value);
        return $this->responseWithData(200, 'Petición éxitosa', $customers);
    }
}
