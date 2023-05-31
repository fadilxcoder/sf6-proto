<?php

namespace App\Form;

use App\Entity\Appointment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AppointmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('location', ChoiceType::class, [
                'choices'  => [
                    'Mahebourg' => 'mbhg',
                    'Camp-Diable' => 'cmpdb',
                ],
                'expanded' => true,
                'multiple' => false,
            ])
            ->add('phone', TextType::class)
            ->add('isBelowAgeLimit')
            ->add('guardian')
            ->add('date', DateType::class)
            ->add('time')
            ->add('notes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appointment::class,
        ]);
    }
}
