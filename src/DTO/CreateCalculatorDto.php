<?php

declare(strict_types=1);

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class CreateCalculatorDto
{
    #[Assert\NotBlank(message: 'Введите число')]
    private float|int $firstNum;

    #[Assert\NotBlank(message: 'Введите число')]
    private float|int $secondNum;

    #[Assert\NotBlank(message: 'Укажите операцию')]
    private string $operation;

    public function getFirstNum(): float
    {
        return $this->firstNum;
    }

    public function setFirstNum(float|int $firstNum): void
    {
        $this->firstNum = $firstNum;
    }

    public function getSecondNum(): float
    {
        return $this->secondNum;
    }

    public function setSecondNum(float|int $secondNum): void
    {
        $this->secondNum = $secondNum;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): void
    {
        $this->operation = $operation;
    }
}
