<?php

namespace Src\Customers\Services;

use Src\Customers\Services\Contracts\ICustomerService;
use Src\Customers\Repositories\Contracts\ICustomerRepository;
use Src\Customers\DTOs\GetAllCustomersDto;
use Src\Customers\DTOs\CreateCustomerDto;
use Src\Customers\DTOs\GetCustomerDto;
use Src\Customers\DTOs\UpdateCustomerDto;

class CustomerService implements ICustomerService
{
    private $customerRepository;

    public function __construct(ICustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getCustomers()
    {
        $data = $this->customerRepository->getAll();
        $customers = [];
        foreach ($data as $d) {
            $customer = new GetAllCustomersDto($d->id, $d->name, $d->email, $d->dni);
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function saveCustomer($data)
    {
        $customer = new CreateCustomerDto(
            0,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        if ($this->customerRepository->save($customer))
            return true;
        return false;
    }

    public function getCustomer($id)
    {
        $data = $this->customerRepository->getById($id);
        $customer = new GetCustomerDto(
            $data->id,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        return $customer;
    }

    public function updateCustomer($id, $data)
    {
        $customer = new UpdateCustomerDto(
            $id,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        if ($this->customerRepository->update($id, $customer))
            return true;
        return false;
    }

    public function deleteCustomer($id)
    {
        if ($this->customerRepository->delete($id))
            return true;
        return false;
    }

    public function searchCustomer($critery, $value)
    {
        $data = $this->customerRepository->searchByCriteria($critery, $value);
        $customers = [];
        foreach ($data as $d) {
            $customer = new GetAllCustomersDto($d->id, $d->name, $d->email, $d->dni);
            array_push($customers, $customer);
        }
        return $customers;
    }
}
