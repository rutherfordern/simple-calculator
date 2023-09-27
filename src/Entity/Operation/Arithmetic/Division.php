<?php

declare(strict_types=1);

namespace App\Entity\Operation\Arithmetic;

use App\Exception\DivisionByZeroException;

class Division implements OperationInterface
{
    public function calculate(float|int $firstNum, float|int $secondNum): float|int
    {
        if (0 == $secondNum) {
            throw new DivisionByZeroException('Деление на ноль не работает');
        }

        return $firstNum / $secondNum;
    }
}
