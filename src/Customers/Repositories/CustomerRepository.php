<?php

namespace Src\Customers\Repositories;

use Src\Customers\Repositories\Contracts\ICustomerRepository;
use Src\Customers\Models\Customer;
use Src\Customers\DTOs\CreateCustomerDto;
use Src\Customers\DTOs\UpdateCustomerDto;

class CustomerRepository implements ICustomerRepository
{
    private $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }

    public function getAll()
    {
        try {
            $customers = $this->customer->orderBy('dni', 'asc')->get();
            return $customers;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function save(CreateCustomerDto $customer)
    {
        try {
            $this->customer->create([
                'name' => $customer->name,
                'phone' => $customer->phone,
                'email' => $customer->email,
                'dni' => $customer->dni,
                'address' => $customer->address
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $customer = $this->customer->find($id);
            return $customer;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($id, UpdateCustomerDto $customer)
    {
        try {
            $this->customer->where('id', $id)->update([
                'name' => $customer->name,
                'phone' => $customer->phone,
                'email' => $customer->email,
                'dni' => $customer->dni,
                'address' => $customer->address
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $this->customer->find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function searchByCriteria($critery, $value)
    {
        try {
            $customers = $this->customer->where($critery, 'LIKE', '%' . $value . '%')->orderBy('dni', 'asc')->get();
            return $customers;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
