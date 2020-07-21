<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => "companyName",
                'required' => true
            ])
            ->add('forName', TextType::class, [
                'label' => "prénom",
                'required'   => false
            ])
            ->add('sirName', TextType::class, [
                'label' => "nom de Famille",
                'required'   => false
            ])
            ->add('telephone', TelType::class, [
                'label' => "numero de téléphone",
                'required'   => false
            ])
            ->add('eMail', EmailType::class, [
                'label' => "adresse couriel",
                'required' => false
            ])
            ->add('address', TextareaType::class,  [
                'label' => "adresse postale",
                'required'   => false,
                'attr' => ['rows' => '5', 'cols' => '75']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
