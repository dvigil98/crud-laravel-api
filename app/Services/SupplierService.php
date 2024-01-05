<?php

namespace App\Services;

use App\Services\Contracts\ISupplierService;
use App\Repositories\Contracts\ISupplierRepository;
use App\Models\Supplier;

class SupplierService implements ISupplierService
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getSuppliers()
    {
        try {
            $suppliers = $this->supplierRepository->getAll();
            return $suppliers;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function saveSupplier($data)
    {
        try {
            $supplier = new Supplier();
            $supplier->name = $data['name'];
            $supplier->phone = $data['phone'];
            $supplier->email = $data['email'];
            $supplier->dni = $data['dni'];
            $supplier->address = $data['address'];
            if ( $this->supplierRepository->saveOrUpdate($supplier) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function getSupplier($id)
    {
        try {
            $supplier = $this->supplierRepository->getById($id);
            return $supplier;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function updateSupplier($id, $data)
    {
        try {
            $supplier = $this->supplierRepository->getById($id);
            $supplier->name = $data['name'];
            $supplier->phone = $data['phone'];
            $supplier->email = $data['email'];
            $supplier->dni = $data['dni'];
            $supplier->address = $data['address'];
            if ( $this->supplierRepository->saveOrUpdate($supplier) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteSupplier($id)
    {
        try {
            if ( $this->supplierRepository->delete($id) )
                return true;
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function searchSupplier($critery, $value)
    {
        try {
            $suppliers = $this->supplierRepository->searchByCriteria($critery, $value);
            return $suppliers;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
