<?php

namespace Src\Suppliers\Repositories;

use Src\Suppliers\Repositories\Contracts\ISupplierRepository;
use Src\Suppliers\Models\Supplier;

class SupplierRepository implements ISupplierRepository
{
    public function getAll()
    {
        try {
            $suppliers = Supplier::orderBy('dni', 'asc')->get();
            return $suppliers;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function saveOrUpdate(Supplier $supplier)
    {
        try {
            $supplier->save();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $supplier = Supplier::find($id);
            return $supplier;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function delete($id)
    {
        try {
            Supplier::find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function searchByCriteria($critery, $value)
    {
        try {
            $suppliers = Supplier::where($critery, 'LIKE', '%'.$value.'%')->orderBy('dni', 'asc')->get();
            return $suppliers;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
