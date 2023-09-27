<?php

declare(strict_types=1);

namespace App\Model\Response;

class CalculationResultResponse
{
    public function __construct(
        private readonly float|int $firstNum,
        private readonly float|int $secondNum,
        private readonly string $operation,
        private readonly float|int $result
    ) {
    }

    public function getFirstNum(): float
    {
        return $this->firstNum;
    }

    public function getSecondNum(): float
    {
        return $this->secondNum;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function formatAsExpression(): string
    {
        return "{$this->getFirstNum()} {$this->getOperation()} {$this->getSecondNum()} = {$this->getResult()}";
    }
}
