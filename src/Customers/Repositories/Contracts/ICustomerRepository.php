<?php

namespace Src\Customers\Repositories\Contracts;

use Src\Customers\DTOs\CreateCustomerDto;
use Src\Customers\DTOs\UpdateCustomerDto;

interface ICustomerRepository
{
    public function getAll();
    public function save(CreateCustomerDto $customer);
    public function getById($id);
    public function update($id, UpdateCustomerDto $customer);
    public function delete($id);
    public function searchByCriteria($critery, $value);
}
