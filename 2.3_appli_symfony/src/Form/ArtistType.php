<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom',
                ],
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prénom',
                ],
                'required' => false,
            ])
            ->add('nickname', TextType::class, [
                'label' => 'Nom d\'artist',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nom d\'artist',
                ],
                'required' => false,
            ])
            ->add('gender', ChoiceType::class, [
                'label' => 'Genre',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'expanded' => true,
                'multiple' => false,
                'placeholder' => false,
                'choices' => [
                    'Homme' => 'man',
                    'Femme' => 'woman',
                ],
                'required' => false,
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date de naissance',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'widget' => 'single_text',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
