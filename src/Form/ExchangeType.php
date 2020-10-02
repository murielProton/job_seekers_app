<?php

namespace App\Form;

use App\Entity\Exchange;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExchangeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, [
                'label' => "Date du rendez- vous*",
                'widget' => 'single_text',
                'required'   => true
            ])
            ->add('schedule', TimeType::class, [
                'input'  => 'datetime',
                'widget' => 'single_text',
                'label' => "Horaire du rendez- vous*",
                'required'   => true
                ])
            ->add('means', ChoiceType::class, [
                'choices' => [
                    "Téléphone" => "Téléphone",
                    "Couriel" => "Couriel",
                    "Médias Sociaux" => "Médias Sociaux",
                    "Méssagerie Instantanée" => "Méssagerie Instantanée",
                    "Echange Vidéo" => "Echange Vidéo"
                ],
                'label' => "Moyen de communication",
                'required' => false,
            ])
            ->add('comments', TextareaType::class,  [
                'label' => "Commentaires",
                'required'   => false,
                'attr' => ['rows' => '2', 'cols' => '111']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exchange::class,
        ]);
    }
}
