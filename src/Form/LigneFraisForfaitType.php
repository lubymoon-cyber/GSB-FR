<?php

namespace App\Form;

use App\Entity\LigneFraisForfait;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneFraisForfaitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateLigneFraisForfait')
            ->add('quantite')
            ->add('dateCreationLigneFraisForfait')
            ->add('justificatif')
            ->add('statutLigneFraisForfait')
            ->add('fraisForfait')
            ->add('utilisateurLigneFraisForfait')
            ->add('ficheFrais')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneFraisForfait::class,
        ]);
    }
}
