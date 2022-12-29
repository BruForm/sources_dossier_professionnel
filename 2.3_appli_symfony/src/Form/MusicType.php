<?php

namespace App\Form;

use App\Entity\Artist;
use App\Entity\Category;
use App\Entity\Music;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de la musique',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Titre de la musique',
                ],
                'required' => false,
            ])
            ->add('duration', NumberType::class, [
                'label' => 'Durée (en secondes)',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Durée (en secondes)',
                ],
                'required' => false,
            ])
            ->add('releaseDate', DateType::class, [
                'label' => 'Date de sortie',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                ],
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('categories', EntityType::class, [
                'class' => Category::class,
                'multiple' => true,
                'expanded' => true,
                'label' => 'Catégories :',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'required' => false,
                'by_reference' => false,
            ])
            ->add('author', EntityType::class, [
                'class' => Artist::class,
                'label' => 'Auteur',
                'placeholder' => 'Auteur :',
                'label_attr' => [
                    'class' => 'form-label',
                ],
                'choice_label' => 'nickname',
                'choice_attr'  => function($choice, $key, $value) {
                    return ['class' => 'bg-dark'];
                },
                'attr' => [
                    'class' => 'form-control bg-transparent',
                ],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
