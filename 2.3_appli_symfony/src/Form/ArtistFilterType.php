<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nicknameFilter', TextType::class, [
                'label' => 'Filter on nickname :',
                'label_attr' => [
                    'class' => 'form-label bg-transparent mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Nickname contains...',
                ],
                'required' => false,
            ])
            ->add('lastnameFilter', TextType::class, [
                'label' => 'Filter on lastname :',
                'label_attr' => [
                    'class' => 'form-label bg-transparent mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Lastname contains...',
                ],
                'required' => false,
            ])
            ->add('firstnameFilter', TextType::class, [
                'label' => 'Filter on firstname :',
                'label_attr' => [
                    'class' => 'form-label bg-transparent mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Firstname contains...',
                ],
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
            'method' => 'GET',
        ]);
    }
}
