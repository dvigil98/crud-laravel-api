<?php

namespace Src\Suppliers\Repositories\Contracts;

use Src\Suppliers\DTOs\CreateSupplierDto;
use Src\Suppliers\DTOs\UpdateSupplierDto;

interface ISupplierRepository
{
    public function getAll();
    public function save(CreateSupplierDto $supplier);
    public function getById($id);
    public function update($id, UpdateSupplierDto $supplier);
    public function delete($id);
    public function searchByCriteria($critery, $value);
}
