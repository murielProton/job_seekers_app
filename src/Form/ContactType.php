<?php

namespace App\Form;

use App\Entity\Company;
use App\Entity\Contact;
use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
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
            ->add('comment', TextareaType::class,  [
                'label' => "Où je l'ai rencontré, quand, pourquoi, comment ?",
                'required'   => false,
                'attr' => ['rows' => '4', 'cols' => '111']
            ]) 
            ->add('companies', EntityType::class, [
                'class' => Company::class,
                'choice_label' => "companyName",
                'label'=> "Nom de l'Entreprise",
                'multiple' => true,
                'expanded' => true,
                'required' => false
            ])
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => "title",
                'label'=> "Titre de la Candidature Associé",
                'required' => false,
            ])
            /*->add('answer')*/

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
