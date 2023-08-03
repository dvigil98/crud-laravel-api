<?php

namespace App\Repositories\Contracts;

use App\Models\Customer;

interface ICustomerRepository
{
    public function getAll();
    public function saveOrUpdate(Customer $customer);
    public function getById($id);
    public function delete($id);
    public function searchByCriteria($critery, $value);
}
