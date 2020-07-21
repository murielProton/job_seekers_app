<?php

namespace App\Form;

use App\Entity\Answer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
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
           /* ->add('application', ApplicationType::class, [
                'label' => "Candidature",
                'required' => true
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
