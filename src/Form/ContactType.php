<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contactTitle', TextType::class,  [
                'label' => "Titre",
                'required'   => false
            ])
            ->add('forName', TextType::class, [
                'label' => "Prénom",
                'required'   => false
            ])
            ->add('sirName', TextType::class, [
                'label' => "Nom de Famille*",
                'required'   => true
            ])
            ->add('telephone', TelType::class, [
                'label' => "Numero de téléphone",
                'required'   => false
            ])
            ->add('eMail', EmailType::class, [
                'label' => "Adresse courriel",
                'required' => false
            ])
            ->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => "companyName",
                'label'=> "Nom de l'Entreprise",
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
