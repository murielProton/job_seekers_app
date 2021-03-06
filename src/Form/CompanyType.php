<?php

namespace App\Form;

use App\Entity\JobInterview;
use App\Entity\Contact;
use App\Entity\Address;
use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('companyName', TextType::class,  [
                'label' => "Nom de l'entreprise ou association*",
                'required'   => true
            ])
            ->add('companyWEBSite', TextType::class,  [
                'label' => "Site WEB de l'Entreprise",
                'required'   => false,
                'csrf_protection' => null
                ])
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires sur l'entreprise",
                'required'   => false,
                'attr' => ['rows' => '2', 'cols' => '111']
            ])
            ->add('address', AddressType::class, [
                'label' => "Adresse de l'Entreprise",
                'required'   => false
            ])
            // Création d'un nouvelle entité par un bouton
            ->add('contacts', CollectionType::class, [
                // each entry in the array will be an "contact" field
                'entry_type' => ContactType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'delete_empty' => true,
                'prototype' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Company::class,
        ]);
    }
}
