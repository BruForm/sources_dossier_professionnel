<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'E-mail',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Your e-mail...',
                ],
                'required' => false,
            ])
            ->add('nickname', TextType::class, [
                'label' => 'Pseudo',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'attr' => [
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Your nickname...',
                ],
                'required' => false,
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Agree terms',
                'label_attr' => [
                    'class' => 'form-label me-2',
                ],
                'attr' => [
                    'class' => 'form-check-input'
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Password',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'form-control bg-transparent',
                    'placeholder' => 'Your password...',
                    ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
