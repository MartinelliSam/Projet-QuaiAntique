<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('firstName', TextType::class, [
                'attr' => ['class' => 'form-control m-1']
            ])
            ->add('lastName', TextType::class, [
                'attr' => ['class' => 'form-control m-1']
            ])
            ->add('email', EmailType::class, [
                'attr' => ['class' => 'form-control m-1']
            ])
            ->add('guestNumber', ChoiceType::class, [
                'attr' => ['class' => 'form-select m-1'],
                'label' => 'Nombre de convives',
                'choices' => [
                    '2' => 2,
                    '4' => 4,
                    '6' => 6,
                    '8' => 8,
                    '10' => 10
                ]])
            ->add('Password', RepeatedType::class, [
                'type' => PasswordType::class,
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'invalid_message' => 'Les deux champs doivent contenir le même mot de passe',
                'options' =>
                ['attr' => ['class' => 'form-control m-1']],

                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez choisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 12,
                        'minMessage' => 'Votre mot de passe doit comporter au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                        'maxMessage' => 'Votre mot de passe ne peut pas dépasser {{ limit }} caractères',
                    ]),
                ],
                'first_options' => ['label' => 'Password'],
                'second_options' => ['label' => 'Repeat Password']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
