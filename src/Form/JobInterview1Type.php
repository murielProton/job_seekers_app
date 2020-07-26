<?php

namespace App\Form;

use App\Entity\JobInterview;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobInterview1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfInterview')
            ->add('schedule')
            ->add('comments')
            ->add('answer')
            ->add('adress')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobInterview::class,
        ]);
    }
}
