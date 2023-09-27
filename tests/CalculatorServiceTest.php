<?php

declare(strict_types=1);

namespace App\Tests;

use App\DTO\CreateCalculatorDto;
use App\Entity\Operation\Arithmetic\Adition;
use App\Entity\Operation\Arithmetic\Division;
use App\Entity\Operation\Arithmetic\Multiplication;
use App\Entity\Operation\Arithmetic\Subtraction;
use App\Entity\Operation\Factory\OperationFactoryInterface;
use App\Exception\DivisionByZeroException;
use App\Model\Response\CalculationResultResponse;
use App\Service\CalculatorService;
use PHPUnit\Framework\TestCase;

class CalculatorServiceTest extends TestCase
{
    private CreateCalculatorDto $calculatorDto;

    protected function setUp(): void
    {
        parent::setUp();

        $this->calculatorDto = new CreateCalculatorDto();
        $this->calculatorDto->setFirstNum(125);
        $this->calculatorDto->setSecondNum(50);
    }

    public function testGetCalculationResultAdition()
    {
        $operationFactoryMock = $this->createMock(OperationFactoryInterface::class);

        $operationFactoryMock->expects($this->once())
            ->method('createOperation')
            ->with('+')
            ->willReturn(new Adition());

        $this->calculatorDto->setOperation('+');

        $calculatorService = new CalculatorService($operationFactoryMock);

        $result = $calculatorService->getCalculationResult($this->calculatorDto);

        $this->assertInstanceOf(CalculationResultResponse::class, $result);
        $this->assertEquals(175, $result->getResult());
    }

    public function testGetCalculationResultSubtraction()
    {
        $operationFactoryMock = $this->createMock(OperationFactoryInterface::class);

        $operationFactoryMock->expects($this->once())
            ->method('createOperation')
            ->with('-')
            ->willReturn(new Subtraction());

        $this->calculatorDto->setOperation('-');

        $calculatorService = new CalculatorService($operationFactoryMock);

        $result = $calculatorService->getCalculationResult($this->calculatorDto);

        $this->assertInstanceOf(CalculationResultResponse::class, $result);
        $this->assertEquals(75, $result->getResult());
    }

    public function testGetCalculationResultMultiplication()
    {
        $operationFactoryMock = $this->createMock(OperationFactoryInterface::class);

        $operationFactoryMock->expects($this->once())
            ->method('createOperation')
            ->with('*')
            ->willReturn(new Multiplication());

        $this->calculatorDto->setOperation('*');

        $calculatorService = new CalculatorService($operationFactoryMock);

        $result = $calculatorService->getCalculationResult($this->calculatorDto);

        $this->assertInstanceOf(CalculationResultResponse::class, $result);
        $this->assertEquals(6250, $result->getResult());
    }

    public function testGetCalculationResultDivision()
    {
        $operationFactoryMock = $this->createMock(OperationFactoryInterface::class);

        $operationFactoryMock->expects($this->once())
            ->method('createOperation')
            ->with('/')
            ->willReturn(new Division());

        $this->calculatorDto->setOperation('/');

        $calculatorService = new CalculatorService($operationFactoryMock);

        $result = $calculatorService->getCalculationResult($this->calculatorDto);

        $this->assertInstanceOf(CalculationResultResponse::class, $result);
        $this->assertEquals(2.5, $result->getResult());
    }

    public function testGetCalculationResultDivisionByZero()
    {
        $operationFactoryMock = $this->createMock(OperationFactoryInterface::class);

        $operationFactoryMock->expects($this->once())
            ->method('createOperation')
            ->with('/')
            ->willReturn(new Division());

        $this->expectException(DivisionByZeroException::class);

        $calculatorDto1 = new CreateCalculatorDto();
        $calculatorDto1->setFirstNum(125);
        $calculatorDto1->setSecondNum(0);
        $calculatorDto1->setOperation('/');

        $calculatorService = new CalculatorService($operationFactoryMock);

        $calculatorService->getCalculationResult($calculatorDto1);
    }
}
