<?php

namespace Src\Suppliers\Services;

use Src\Suppliers\DTOs\CreateSupplierDto;
use Src\Suppliers\DTOs\GetAllSuppliersDto;
use Src\Suppliers\DTOs\GetSupplierDto;
use Src\Suppliers\DTOs\UpdateSupplierDto;
use Src\Suppliers\Services\Contracts\ISupplierService;
use Src\Suppliers\Repositories\Contracts\ISupplierRepository;
use Src\Suppliers\Models\Supplier;

class SupplierService implements ISupplierService
{
    private $supplierRepository;

    public function __construct(ISupplierRepository $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getSuppliers()
    {
        $data = $this->supplierRepository->getAll();
        $suppliers = [];
        foreach ($data as $d) {
            $supplier = new GetAllSuppliersDto($d->id, $d->name, $d->email, $d->dni);
            array_push($suppliers, $supplier);
        }
        return $suppliers;
    }

    public function saveSupplier($data)
    {
        $supplier = new CreateSupplierDto(
            0,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        if ($this->supplierRepository->save($supplier))
            return true;
        return false;
    }

    public function getSupplier($id)
    {
        $data = $this->supplierRepository->getById($id);
        $supplier = new GetSupplierDto(
            $data->id,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        return $supplier;
    }

    public function updateSupplier($id, $data)
    {
        $supplier = new UpdateSupplierDto(
            $id,
            $data->name,
            $data->phone,
            $data->email,
            $data->dni,
            $data->address
        );
        if ($this->supplierRepository->update($id, $supplier))
            return true;
        return false;
    }

    public function deleteSupplier($id)
    {
        if ($this->supplierRepository->delete($id))
            return true;
        return false;
    }

    public function searchSupplier($critery, $value)
    {
        $data = $this->supplierRepository->searchByCriteria($critery, $value);
        $suppliers = [];
        foreach ($data as $d) {
            $supplier = new GetAllSuppliersDto($d->id, $d->name, $d->email, $d->dni);
            array_push($suppliers, $supplier);
        }
        return $suppliers;
    }
}
