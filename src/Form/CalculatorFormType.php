<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\CreateCalculatorDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstNum', TextType::class, [
                'label' => 'Аргумент 1',
            ])
            ->add('operation', ChoiceType::class, [
                'label' => 'Операция',
                'choices' => [
                    '+' => '+',
                    '-' => '-',
                    '*' => '*',
                    '/' => '/',
                ],
            ])
            ->add('secondNum', TextType::class, [
                'label' => 'Аргумент 2',
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Вычислить',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CreateCalculatorDto::class,
        ]);
    }
}
