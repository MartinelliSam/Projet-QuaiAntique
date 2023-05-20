<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('guestNumber', ChoiceType::class, [
                'attr' => ['class' => 'form-select m-1'],
                'label' => 'Modifier le nombre de convives par défaut',
                'choices' => [
                    '2' => 2,
                    '4' => 4,
                    '6' => 6,
                    '8' => 8,
                    '10' => 10
                ]])
             ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
