<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('roles')
            ->add('password')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('ville')
            ->add('codePostal')
            ->add('dateEmbauche', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'dd-MM-yyyy',
                 // 2. Disable HTML5 option
                'html5' => false,
                // adds a class that can be selected in JavaScript
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('matricule')
            ->add('telephone')
            ->add(
                'roles',
                ChoiceType::class, [
                    'choices' => [
                        'ROLE_SUPER_ADMIN' => 'SUPER_ROLE_ADMIN',
                        'ROLE_ADMIN' => 'ROLE_ADMIN',
                        'ROLE_COMPTABLE' => 'ROLE_COMPTABLE',
                        'ROLE_COMMERCIAL' => 'ROLE_COMMERCIAL',
                        'ROLE_USER' => 'ROLE_USER'
                    ],
                    'expanded' => true,
                    'multiple' => true,
                ]
            )
            ->add('password',
                RepeatedType::class,
                array(
                    'type'              => PasswordType::class,
                    'mapped'            => false,
                    'first_options'     => array('label' => 'New password'),
                    'second_options'    => array('label' => 'Confirm new password'),
                    'invalid_message' => 'The password fields must match.',
                )
            )
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
