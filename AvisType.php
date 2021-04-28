<?php

namespace App\Form;

use App\Entity\Avis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices' => array(
                    'Trés satisfait' => 'Trés satisfait',
                    'Satisfait' => 'Satisfait',
                    'Insatisfait' => 'Insatisfait',
                    'Trés insatisfait' => 'Trés insatisfait',

                )))
            ->add('avis', TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Mettez votre avis', 'type' => 'text', 'aria-required' => 'true', 'size' => '100', 'name' => 'name', 'id' => 'footer-name', 'class' => 'form-control111 text-center'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Avis::class,
        ]);
    }
}
