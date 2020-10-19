<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userName', TextType::class,  [
                'label' => "Nom ou Pseudonyme*",
                //'sub label' => "Il doit être unique en base de donnée.",
                'required'   => true
            ])
            ->add('roles', ChoiceType::class, [
                'label' => "Je suis :*",
                'mapped' => true,
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    "en recherche d'emploi." => 'ROLE_USER',
                    "Developpeur." => 'ROLE_DEV',
                    "Administrateur." => 'ROLE_ADMIN',
                ]
            ])
            ->add('password', PasswordType::class, [
                //'sub label' => "obligatoire et entre 6 et 20 charactères",
                'label' => "Mot de passe*",
                'required' => true 
            ])
            ->add('eMail', EmailType::class, [
                'label' => "Adresse courriel",
                'required' => false
            ])
            ->add('phoneNumber', TelType::class, [
                'label' => "Numero de téléphone",
                'required'   => false
            ])
            ->add('currentWorkTitle', TextType::class,  [
                'label' => "Fonction actuelle",
                'required'   => false
            ])
            /*->add('targetedWorkTitle', CollectionType::class, [
                // each entry in the array will be an "contact" field
                'entry_type' => TextType::class,
                'label' => "Fonction visée(s)",
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'prototype' => true
            ])
            ->add('whereOu', TextType::class, array(
                'label' => 'Où'
            ))*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
