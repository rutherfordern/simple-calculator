<?php

declare(strict_types=1);

namespace App\Entity\Operation\Factory;

use App\Entity\Operation\Arithmetic\Adition;
use App\Entity\Operation\Arithmetic\Division;
use App\Entity\Operation\Arithmetic\Multiplication;
use App\Entity\Operation\Arithmetic\OperationInterface;
use App\Entity\Operation\Arithmetic\Subtraction;

class ArithmeticOperationFactory implements OperationFactoryInterface
{
    public function createOperation(string $operation): OperationInterface
    {
        return match ($operation) {
            '+' => new Adition(),
            '-' => new Subtraction(),
            '*' => new Multiplication(),
            '/' => new Division(),
        };
    }
}
