<?php

namespace App\Services\Contracts;

interface ISupplierService
{
    public function getSuppliers();
    public function saveSupplier($data);
    public function getSupplier($id);
    public function updateSupplier($id, $data);
    public function deleteSupplier($id);
    public function searchSupplier($critery, $value);
}
