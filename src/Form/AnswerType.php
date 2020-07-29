<?php

namespace App\Form;

use App\Entity\Answer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'label' => "Date de la réponse*",
                'widget' => 'single_text',
                'required'   => true
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
                'multiple' => false,
                'required' => false,
                'label' => "réponse",
            ))
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires",
                'required'   => false,
                'attr' => ['rows' => '4', 'cols' => '111']
            ])
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => "Candidature*",
                'required' => true,
            ])
            ->add('jobInterview')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
