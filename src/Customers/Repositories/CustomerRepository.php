<?php

namespace Src\Customers\Repositories;

use Src\Customers\Repositories\Contracts\ICustomerRepository;
use Src\Customers\Models\Customer;

class CustomerRepository implements ICustomerRepository
{
    public function getAll()
    {
        try {
            $customers = Customer::orderBy('dni', 'asc')->get();
            return $customers;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function saveOrUpdate(Customer $customer)
    {
        try {
            $customer->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $customer = Customer::find($id);
            return $customer;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function delete($id)
    {
        try {
            Customer::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function searchByCriteria($critery, $value)
    {
        try {
            $customers = Customer::where($critery, 'LIKE', '%'.$value.'%')->orderBy('dni', 'asc')->get();
            return $customers;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
