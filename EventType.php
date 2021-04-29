<?php

namespace App\Form;

use App\Entity\Evenement;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateAt')
            ->add('my_picture',FileType::class,[
                'mapped'=>false,
            ])
            ->add('title')
            ->add('type')
            ->add('description')
            ->add('localisation')
            ->add('localitation')
            ->add('viewed')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
