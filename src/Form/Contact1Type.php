<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Contact1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contactTitle')
            ->add('forName')
            ->add('sirName')
            ->add('telephone', TelType::class, [
                'label' => "Numero de téléphone",
                'required'   => false
            ])
            ->add('eMail')
            ->add('answer')
            ->add('application')
            ->add('address')
            ->add('companies')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
