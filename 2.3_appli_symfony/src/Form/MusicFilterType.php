<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MusicFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('musicFilter', TextType::class, [
                'label' => 'Filter on music title :',
                'label_attr' => [
                    'class' => 'form-label bg-transparent mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Titre contains...',
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
