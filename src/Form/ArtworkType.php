<?php

namespace App\Form;

use App\Entity\Artwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtworkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objectName')
            ->add('title')
            ->add('dimensions')
            ->add('medium')
            ->add('isHighlight')
            ->add('isPublicDomain')
            ->add('primaryImage')
            ->add('primaryImageSmall')
            ->add('additionalImages')
            ->add('accessionYear')
            ->add('wikidataURL');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artwork::class,
        ]);
    }
}
