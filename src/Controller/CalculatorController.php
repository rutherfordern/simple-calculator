<?php

declare(strict_types=1);

namespace App\Controller;

use App\DTO\CreateCalculatorDto;
use App\Exception\DivisionByZeroException;
use App\Form\CalculatorFormType;
use App\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    public function __construct(private readonly CalculatorService $calculatorService)
    {
    }

    #[Route('/', name: 'calculator_index', methods: ['GET', 'POST'])]
    public function index(Request $request, MessageBusInterface $bus): Response
    {
        $calculatorDto = new CreateCalculatorDto();

        $form = $this->createForm(CalculatorFormType::class, $calculatorDto);
        $form->handleRequest($request);

        $resultCalculation = null;

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $resultCalculation = $this->calculatorService
                    ->getCalculationResult($calculatorDto)
                    ->formatAsExpression();
            } catch (DivisionByZeroException $e) {
                $form->addError(new FormError($e->getMessage()));
            }
        }

        return $this->render('index.html.twig', [
            'form' => $form,
            'calculatorDto' => $calculatorDto,
            'result' => $resultCalculation,
        ]);
    }
}
