<?php

namespace App\Form;

use App\Entity\Application;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('webSiteName')
            //->add('webSiteName', TextType::class,  ['label' => 'nom du site WEB'])
            //->add('webSiteName', StringType::class,  ['label' => 'nom du site WEB'])
//->add('webSiteName',array('label' => 'nom du site WEB'))
//->add('webSiteName', array('string'=>'choice','label' => 'nom du site WEB'))
            ->add('companyName')
            ->add('jobAdvertisement')
            ->add('contact', /*ContactType::class*/)
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
