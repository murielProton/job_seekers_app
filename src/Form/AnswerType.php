<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\Application;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;

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
            ->add('textOfAnswer',ChoiceType::class,[
                'choices'  => [
                    "A recontacter." => "A recontacter.",
                    "Me recontacte." => "Me recontacte.",
                    "Entretien téléphonique." => "Entretien téléphonique.",
                    "Entretien à distance." => "Entretien à distance.",
                    "Entretien." => "Entretien.",
                    "Embauché(e)!" => "Embauché(e)!",
                ],
                'label' => "Réponse",
                'required' => false,
                ])
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires",
                'required'   => false,
                'attr' => ['rows' => '4', 'cols' => '111']
            ])
            ->add('application', ChoiceType::class, [
                /*'class' => Application::class,
                'choice_label' => "title",*/
                'label'=> "Annonce*",
                'required' => true, 
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Answer::class,
        ]);
    }
}
