<?php

namespace App\Form;

use App\Entity\JobInterview;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobInterviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfInterview', DateType::class, [
                'label' => "date de la première relance*",
                'widget' => 'single_text',
                'required'   => false
            ])
            ->add('schedule', TimeType::class, [
                'input'  => 'timestamp',
                'widget' => 'choice',
                'label' => "Horaire"
            ])
            ->add('Address', TextareaType::class,[
                'label' => "Adresse"
            ])
            ->add('contactForName', TextType::class,[
                'label' =>"Prénom"
            ])
            ->add('contactSirName', TextType::class,[
                'label' =>"Nom"
            ])
            ->add('contactTitle', TextType::class,[
                'label' =>"Titre"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobInterview::class,
        ]);
    }
}
