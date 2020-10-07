<?php

namespace App\Form;

use App\Entity\Exchange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExchangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'label' => "Date du rendez- vous",
                'widget' => 'single_text',
                'required' => true
            ])
            ->add('schedule', TimeType::class, [
                'input' => 'datetime',
                'widget' => 'single_text',
                'label' => "Horaire du rendez- vous",
                'required' => true
            ])
            ->add('means', ChoiceType::class, [
                'choices' => [
                    "Téléphone" => "Téléphone",
                    "Couriel" => "Couriel",
                    "Médias Sociaux" => "Médias Sociaux",
                    "Méssagerie Instantanée" =>  "Méssagerie Instantanée",
                    "Echanges Vidéo" =>  "Echanges Vidéo"
                ],
                'label' => "Moyen de communication",
                'required' => false
            ])
            ->add('comments', TextareaType::class, [
                'label' => "Description de l'échange et commentaires :",
                'required' => true,
                'attr' => ['rows' => '2', 'coles' => '111']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exchange::class,
        ]);
    }
}
