<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('displayName', TextType::class, [
                'required' => true
            ])
            ->add('beginDate', IntegerType::class, [
                'required' => true
            ])
            ->add('endDate', IntegerType::class)
            ->add('gender', ChoiceType::class, [
                'required' => true,
                'choices' => [
                    'Male' => 'Male',
                    'Female' => 'Female'
                ]
            ])
            ->add('nationality', TextType::class, [
                'required' => true
            ])
            ->add('role', TextType::class, [
                'required' => true
            ])
            ->add('displayBio', TextareaType::class)
            ->add('wikidataURL', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
