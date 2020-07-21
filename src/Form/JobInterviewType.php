<?php

namespace App\Form;

use App\Entity\JobInterview;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobInterviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfInterview')
            ->add('schedule')
            ->add('Address')
            ->add('contactForName')
            ->add('contactSirName')
            ->add('contactTitle')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobInterview::class,
        ]);
    }
}
