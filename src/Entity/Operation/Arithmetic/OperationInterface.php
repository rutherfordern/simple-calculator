<?php

declare(strict_types=1);

namespace App\Entity\Operation\Arithmetic;

interface OperationInterface
{
    public function calculate(float $firstNum, float $secondNum);
}
