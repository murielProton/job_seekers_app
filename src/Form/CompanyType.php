<?php

namespace App\Form;

use App\Entity\Company;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
                'required'   => false
                ])
            /*->add('comments', TextareaType::class,  [
                'label' => "Commentaires sur l'entreprise",
                'required'   => false,
                'attr' => ['rows' => '2', 'cols' => '111']
            ])*/
            ->add('contact', ContactType::class, [
                'label' => "Contact :",
                'required'   => false
            ])
            ->add('address', AddressType::class, [
                'label' => "Adresse de l'Entreprise",
                'required'   => false
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
