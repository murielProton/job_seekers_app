<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('webSiteName')
            ->add('companyName')
            ->add('jobAdvertisement')
            ->add('contact')
            ->add('postingDate')
            ->add('folowUpDate')
            ->add('answer')
            ->add('unsolicited')
            ->add('comments')
            ->add('jobInterview')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
