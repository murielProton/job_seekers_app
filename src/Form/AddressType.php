<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('floor', NumberType::class, [
                'label' => "Etage",
                'required'   => false
            ])
            ->add('number', NumberType::class, [
                'label' => "Numéro de rue ou place",
                'required'   => false
            ])
            ->add('way', TextType::class, [
                'label' => "Nom de rue, place ...",
                'required'   => false
            ])
            ->add('postCode', NumberType::class, [
                'label' => "Code postal",
                'required'   => false
            ])
            ->add('city', TextType::class, [
                'label' => "Ville",
                'required'   => false
            ])
            ->add('country', CountryType::class, [
                'label' => "Pays",
                'required'   => false
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
