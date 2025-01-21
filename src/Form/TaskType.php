<?php

namespace App\Form;

use App\Entity\Task;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Task Name',
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status',
                'choices' => [
                    'Pas commencer' => 'Pas commencer',
                    'En cours' => 'En cours',
                    'Completer' => 'Completer',
                    'Bloquer' => 'Bloquer',
                ],
            ])
            ->add('priority', ChoiceType::class, [
                'label' => 'Priority',
                'choices' => [
                    'Bas' => 'Bas',
                    'Moyen' => 'Moyen',
                    'Haut' => 'Haut',
                ],
            ])
            ->add('dateEnd', DateType::class, [
                'label' => 'End Date',
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('users', EntityType::class, [
                'class' => User::class,
                'label' => 'Assigned Users',
                'multiple' => true,
                'expanded' => true,  
                'choice_label' => 'email',  
            ]);
    
        }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}
