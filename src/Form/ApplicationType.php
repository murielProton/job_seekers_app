<?php

namespace App\Form;

use App\Entity\Application;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('company', CompanyType::class, [
                'label' => "Entreprise",
                'required'   => false
            ])
            ->add('postingDate', DateType::class, [
                'label' => "Date de la première prise de contact*",
                'widget' => 'single_text',
                'required'   => true
            ])
            ->add('folowUpDate', DateType::class, [
                'label' => "Date de la première relance",
                'widget' => 'single_text',
                'required'   => false
            ])
            ->add('unsolicited', CheckboxType::class, [
                'label' => "Candidature spontanée",
                'required'   => false
            ])
            ->add('jobAdvertisement', TextareaType::class,  [
                'label' => "Annonce",
                'required'   => false,
                'attr' => ['rows' => '8', 'cols' => '111'],
                'csrf_protection' => null
            ])
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires",
                'required'   => false,
                'attr' => ['rows' => '2', 'cols' => '111']
            ])
            ->add('addsWEBSite', TextType::class,  [
                'label' => "Nom du site WEB",
                'required'   => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
