<?php

namespace App\Form;

use App\Entity\Application;
use App\Entity\Contact;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('webSiteName', TextType::class,  ['label' => 'nom du site WEB'])
            ->add('companyName')
            ->add('jobAdvertisement')
            ->add('contact',ContactType::class)
            /* [
                'class' => Contact::class,
                'choice_label' => 'Contact',
            ]*/
            ->add('postingDate')
            /*->add('postingDate', 'date',array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'pattern' => '{{ day }}-{{ month }}-{{ year }}',
                'years' => range(Date('Y'), 2010),
                'label' => 'nom du site WEB',
                'input' => 'string',
                'data'  => '01-01-2001'
            ))*/
            /*->add('postingDate', DateType::class,array(
                'widget' => 'choice',
                'format' => 'dd-MM-yyyy',
                'pattern' => '{{ day }}-{{ month }}-{{ year }}',
                'years' => range(Date('Y'), 2010),
                'label' => 'nom du site WEB',
                'input' => 'string',
                'data'  => '01-01-2001'
            ))*/
            ->add('folowUpDate')
            ->add('answer')
            ->add('unsolicited')
            ->add('comments')
            ->add('jobInterview');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Application::class,
        ]);
    }
}
