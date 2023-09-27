<?php

declare(strict_types=1);

namespace App\Message;

use App\DTO\CreateCalculatorDto;

class CalculateMessage
{
    public function __construct(private readonly CreateCalculatorDto $calculatorDto)
    {
    }

    public function getCalculatorDto(): CreateCalculatorDto
    {
        return $this->calculatorDto;
    }
}
