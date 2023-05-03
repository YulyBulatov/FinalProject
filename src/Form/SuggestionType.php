<?php

namespace App\Form;

use App\Entity\Suggestion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SuggestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text')
            ->add('isAnonymous', ChoiceType::class, [
                'choices' => [
                    'Input name' => false,
                    'Stay anonymous' => true,
                ],
                'expanded' => true,
                'label' => 'Do you want to input your name or stay anonymous?',
            ])
            ->add('creationDateTime')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suggestion::class,
        ]);
    }
}
