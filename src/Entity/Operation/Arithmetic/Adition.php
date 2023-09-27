<?php

declare(strict_types=1);

namespace App\Entity\Operation\Arithmetic;

class Adition implements OperationInterface
{
    public function calculate(float|int $firstNum, float|int $secondNum): float|int
    {
        return $firstNum + $secondNum;
    }
}
