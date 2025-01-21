<?php

namespace App\Form;

use App\Entity\Prospect;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProspectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => false,
            ])
            ->add('OriginLead', TextType::class, [
                'required' => false,
            ])
            ->add('phone', NumberType::class, [
                'required' => false,
            ])
            ->add('status', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Nouveau' => 'Nouveau',
                    'Contacter' => 'Contacter',
                    'Qualifier' => 'Qualifier',
                    'Proposition' => 'Proposition',
                    'Negociation' => 'Negociation',
                    'Gagner' => 'Gagner',
                    'Perdu' => 'Perdu',
                ],
                'placeholder' => 'Séléctionnez le status',
            ])
            ->add('budget', NumberType::class, [
                'required' => false,
            ])
            ->add('priority', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'HAUT' => 'HAUT',
                    'MOYEN' => 'MOYEN',
                    'BAS' => 'BAS',
                ],
                'placeholder' => 'Séléctionnez la priorité',
            ])
            ->add('lastContact', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
            ])
            ->add('notes', TextType::class, [
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prospect::class,
        ]);
    }
}
