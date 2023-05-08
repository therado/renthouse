<?php

namespace App\Form;

use App\Entity\Apartament;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ApartamentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('description')
            ->add('price')
            ->add('availability')
            ->add('bookableFrom')
            ->add('bookableTo')
            ->add('imageFilename1')
            ->add('imageFilename2')
            ->add('imageFilename3')
            ->add('imageFilename4')
            ->add('imageFilename5')
            ->add('reservation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Apartament::class,
        ]);
    }
}
