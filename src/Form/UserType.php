<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName')
            ->add('roles', ChoiceType::class, [
                'label' => "Rôle",
                'multiple'=>false,
                'choices' => [
                    'User' => 'ROLE_USER',
                    'Developper' => 'ROLE_DEV',
                    'Admin' => 'ROLE_ADMIN',
    
                ]
            ])
            ->add('password')
            ->add('eMail')
            ->add('phoneNumber')
            ->add('currentWorkTitle')
            ->add('targetedWorkTitle')
            ->add('whereOu', CountryType::class, [
                'label' => "Pays",
                'required'   => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
