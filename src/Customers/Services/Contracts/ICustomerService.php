<?php

namespace Src\Customers\Services\Contracts;

interface ICustomerService
{
    public function getCustomers();
    public function saveCustomer($data);
    public function getCustomer($id);
    public function updateCustomer($id, $data);
    public function deleteCustomer($id);
    public function searchCustomer($critery, $value);
}
