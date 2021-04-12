<?php

namespace App\Form;

use App\Entity\Messaging;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessagingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('etat')
            ->add('archives')
            ->add('objet')
            ->add('message')
            ->add('dateMesage')
            ->add('userMail')
            ->add('userDestination')
            ->add('userEnvoyeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Messaging::class,
        ]);
    }
}
