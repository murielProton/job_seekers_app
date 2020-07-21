<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => "companyName",
                'required' => true
            ])
            ->add('date', DateType::class, [
                'label' => "date de la réponse",
                'widget' => 'single_text',
                'required' => false
            ])
            ->add('textOfAnswer',ChoiceType::class,array(
                'choices'  => array(
                    "A recontacter." => "A recontacter.",
                    "Me recontacte." => "Me recontacte.",
                    "Entretien téléphonique." => "Entretien téléphonique.",
                    "Entretien à distance." => "Entretien à distance.",
                    "Entretien." => "Entretien.",
                    "Embauché(e)!" => "Embauché(e)!",
                ),
                'expanded' => true,
                'multiple' => true,
                'required' => false,
                'label' => "réponse",
            ))
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
