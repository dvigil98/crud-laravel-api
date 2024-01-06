<?php

namespace Src\Suppliers\Repositories\Contracts;

use Src\Suppliers\Models\Supplier;

interface ISupplierRepository
{
    public function getAll();
    public function saveOrUpdate(Supplier $supplier);
    public function getById($id);
    public function delete($id);
    public function searchByCriteria($critery, $value);
}
