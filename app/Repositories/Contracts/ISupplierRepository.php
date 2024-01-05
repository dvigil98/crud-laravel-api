<?php

namespace App\Repositories\Contracts;

use App\Models\Supplier;

interface ISupplierRepository
{
    public function getAll();
    public function saveOrUpdate(Supplier $supplier);
    public function getById($id);
    public function delete($id);
    public function searchByCriteria($critery, $value);
}
