<?php

declare(strict_types=1);

namespace App\MessageHandler;

use App\Message\CalculateMessage;
use App\Model\Response\CalculationResultResponse;
use App\Service\CalculatorService;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CalculateMessageHandler
{
    public function __construct(private readonly CalculatorService $calculatorService)
    {
    }

    public function __invoke(CalculateMessage $message): CalculationResultResponse
    {
        $calculatorDto = $message->getCalculatorDto();

        return $this->calculatorService->getCalculationResult($calculatorDto);
    }
}
