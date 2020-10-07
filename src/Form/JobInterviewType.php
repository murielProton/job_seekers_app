<?php

namespace App\Form;

use App\Entity\JobInterview;
use App\Entity\Company;
use App\Entity\Address;
use App\Entity\Application;
use App\Entity\Exchange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobInterviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            /*->add('company', EntityType::class, [
                'class' => Company::class,
                'choice_label' => "companyName",
                'label' => "Nom de l'Entreprise",
                'required'   => false
            ])
            ->add('answer', EntityType::class, [
                'class' => Answer::class,
                'choice_label' => "date", 
                'label'=> "Réponse",
                'required' => false, 
            ])*/

            ->add('exchange', EntityType::class, [
                'class' => Exchange::class,
                'choice_label' => "date",
                'label'=> "Date de l'entretien*",
                'required' => true, 
            ])
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => "title",
                'label'=> "Titre de la Candidature Associé*",
                'required' => true, 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobInterview::class,
        ]);
    }
}
