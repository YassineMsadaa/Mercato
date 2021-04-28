<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr'=>[
                    'placeholder' => 'Titre de la reclamation', 'type'=>'text', 'aria-required'=>'true', 'size'=>'30' , 'name'=>'name', 'id'=>'footer-name', 'class' =>'form-control111 text-center'
                ]
            ])

            ->add('subject', ChoiceType::class, array(
                'choices' => array(
                    'Probleme de connexion' => 'Probleme de connexion',
                    'Probleme de rendez-vous' => 'Probleme de rendez-vous',
                    'Probleme de like' => 'Probleme de like',
                    'Probleme de commentaire' => 'Probleme de commentaire',
                    'Probleme de sponsorisation' => 'Probleme de sponsorisation',
                    
                )))

            ->add('body',TextareaType::class, [
                'attr' => [
                    'placeholder' => 'Mettez votre reclamation', 'type' => 'text', 'aria-required' => 'true', 'size' => '100', 'name' => 'name', 'id' => 'footer-name', 'class' => 'form-control111 text-center'
                ]
            ])



            ->add('etatprobleme', TextType::class, [
                'attr'=>[
                    'placeholder' => 'Etat mit automatiquement en attente', 'type'=>'text', 'aria-required'=>'true', 'size'=>'30' , 'name'=>'name', 'id'=>'footer-name', 'class' =>'form-control111 text-center'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
