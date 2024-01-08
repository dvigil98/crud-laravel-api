<?php

namespace Src\Suppliers\DTOs;

class GetAllSuppliersDto
{
    public $id;
    public $name;
    public $email;
    public $dni;

    public function __construct(
        $id,
        $name,
        $email,
        $dni
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->dni = $dni;
    }
}
