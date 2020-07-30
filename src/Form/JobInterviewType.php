<?php

namespace App\Form;

use App\Entity\JobInterview;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JobInterviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateOfInterview', DateType::class, [
                'label' => "Date du rendez- vous*",
                'widget' => 'single_text',
                'required'   => true
            ])
            ->add('schedule', DateTimeType::class, [
                'label' => "Horaire du rendez- vous*",
                'widget' => 'single_text',
                'required'   => true
            ])
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires",
                'required'   => false,
                'attr' => ['rows' => '2', 'cols' => '111']
            ])
            ->add('answer', ChoiceType::class, [
                /*'class' => Answer::class,
                'choice_label' => "date",*/
                'label'=> "Réponse",
                'required' => false, 
            ])
            ->add('adress')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => JobInterview::class,
        ]);
    }
}
