<?php

namespace Src\Suppliers\Repositories;

use Src\Suppliers\Repositories\Contracts\ISupplierRepository;
use Src\Suppliers\Models\Supplier;
use Src\Suppliers\DTOs\CreateSupplierDto;
use Src\Suppliers\DTOs\UpdateSupplierDto;

class SupplierRepository implements ISupplierRepository
{
    private $supplier;

    public function __construct()
    {
        $this->supplier = new Supplier();
    }

    public function getAll()
    {
        try {
            $suppliers = $this->supplier->orderBy('dni', 'asc')->get();
            return $suppliers;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function save(CreateSupplierDto $supplier)
    {
        try {
            $this->supplier->create([
                'name' => $supplier->name,
                'phone' => $supplier->phone,
                'email' => $supplier->email,
                'dni' => $supplier->dni,
                'address' => $supplier->address
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getById($id)
    {
        try {
            $supplier = $this->supplier->find($id);
            return $supplier;
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function update($id, UpdateSupplierDto $supplier)
    {
        try {
            $this->supplier->where('id', $id)->update([
                'name' => $supplier->name,
                'phone' => $supplier->phone,
                'email' => $supplier->email,
                'dni' => $supplier->dni,
                'address' => $supplier->address
            ]);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $this->supplier->find($id)->delete();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function searchByCriteria($critery, $value)
    {
        try {
            $suppliers = $this->supplier->where($critery, 'LIKE', '%' . $value . '%')->orderBy('dni', 'asc')->get();
            return $suppliers;
        } catch (\Throwable $th) {
            return null;
        }
    }
}
