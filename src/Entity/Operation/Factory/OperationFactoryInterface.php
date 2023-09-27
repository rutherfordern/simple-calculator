<?php

declare(strict_types=1);

namespace App\Entity\Operation\Factory;

use App\Entity\Operation\Arithmetic\OperationInterface;

interface OperationFactoryInterface
{
    public function createOperation(string $operation): OperationInterface;
}
