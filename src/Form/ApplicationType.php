<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\Type\ChoiceType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('webSiteName', TextType::class,  [
                'label' => "nom du site WEB",
                'required'   => false
            ])
            ->add('companyName', TextType::class,  [
                'label' => "nom de l'entreprise ou association*",
                'required'   => true
            ])
            ->add('jobAdvertisement', TextareaType::class,  [
                'label' => "annonce",
                'required'   => false,
                'attr' => ['rows' => '8', 'cols' => '75']
            ])/*, [
                'attr' => ['class' => 'tinymce'],
            ])*/

            ->add('contact', ContactType::class, [
                'label' => "Contact",
                'required'   => false
            ])
            /* [
                'class' => Contact::class,
                'choice_label' => 'Contact',
            ])*/
            ->add('postingDate', DateType::class, [
                'label' => "date de la première prise de contact*",
                'widget' => 'single_text',
                'required'   => true
            ])
            ->add('folowUpDate', DateType::class, [
                'label' => "date de la première relance*",
                'widget' => 'single_text',
                'required'   => false
            ])
            ->add('unsolicited', CheckboxType::class, [
                'label' => "candidature spontanée",
                'required'   => false
            ])
            ->add('comments', TextareaType::class,  [
                'label' => "commentaires",
                'required'   => false,
                'attr' => ['rows' => '8', 'cols' => '75']
            ])/*, [
                'attr' => ['class' => 'tinymce'],
            ])*/;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
