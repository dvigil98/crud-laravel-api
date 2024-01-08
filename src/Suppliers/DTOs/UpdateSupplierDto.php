<?php

namespace Src\Suppliers\DTOs;

class UpdateSupplierDto
{
    public $id;
    public $name;
    public $phone;
    public $email;
    public $dni;
    public $address;

    public function __construct(
        $id,
        $name,
        $phone,
        $email,
        $dni,
        $address
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->dni = $dni;
        $this->address = $address;
    }
}
