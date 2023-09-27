<?php

declare(strict_types=1);

namespace App\Service;

use App\DTO\CreateCalculatorDto;
use App\Entity\Operation\Factory\OperationFactoryInterface;
use App\Model\Response\CalculationResultResponse;

class CalculatorService
{
    public function __construct(private readonly OperationFactoryInterface $operationFactory)
    {
    }

    public function getCalculationResult(CreateCalculatorDto $calculatorDto): CalculationResultResponse
    {
        $firstNum = $calculatorDto->getFirstNum();
        $secondNum = $calculatorDto->getSecondNum();

        $operation = $this->operationFactory->createOperation($calculatorDto->getOperation());

        $result = $operation->calculate($firstNum, $secondNum);

        return new CalculationResultResponse($firstNum, $secondNum, $calculatorDto->getOperation(), $result);
    }
}
