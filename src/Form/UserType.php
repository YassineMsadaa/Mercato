<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('email')
            ->add('name')
            ->add('lastName')
            ->add('birthDate')
            ->add('speciality')
            ->add('status')
            ->add('experience')
            ->add('hight')
            ->add('weight')
            ->add('post')
            ->add('cv')
            ->add('media')
            ->add('company')
            ->add('position')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
