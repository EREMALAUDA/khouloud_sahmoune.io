<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', null,[
            // 'attr' => [  'placeholder' => 'name']
            ])
        ->add('surname', null,[
            // 'attr' => [  'placeholder' => 'surname']
            ])
        ->add('email',null,[
            // 'attr' => [  'placeholder' => 'email']
            ])
        ->add('subject',null,[
            // 'attr' => [  'placeholder' => 'subject']
            ])
        ->add('message',null,[
            // 'attr' => [  'placeholder' => 'message']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        // 
        ]);
    }
}
