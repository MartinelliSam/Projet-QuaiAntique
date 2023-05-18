<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control mt-2'],
                'required' => 'true'
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control mt-2'],
                'required' => 'true'
            ])
            ->add('date', DateType::class, [
                'label' => 'Date de la réservation',
                'attr' => ['class' => 'mt-2 form-control'],
                'widget' => 'single_text',
                'required' => 'true',
                'invalid_message' => 'La date doit être supérieure à celle du jour'
            ])
            ->add('time', TimeType::class, [
                'label' => 'Heure de la réservation',
                'attr' => ['class' => 'mt-2'],
                'required' => 'true',
                'widget' => 'choice',
                'hours' => [12, 13, 19, 20, 21],
                'minutes' => [00, 15, 30, 45]
            ])
            ->add('guestNumber', ChoiceType::class, [
                'label' => 'Nombre de convives',
                'attr' => ['class' => 'form-select mt-2'],
                'choices' => [
                    '2' => 2,
                    '4' => 4,
                    '6' => 6,
                    '8' => 8,
                    '10' => 10
                ],
                'required' => 'true'
            ])
            ->add('guestEmail', EmailType::class, [
                'label' => 'Votre email',
                'attr' => ['class' => 'form-control mt-2'],
                'required' => 'true'
            ]);
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            ]);
    }

}
