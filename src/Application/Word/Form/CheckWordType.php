<?php

namespace App\Application\Word\Form;

use App\Application\Word\DTO\WrittenWordDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CheckWordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('writtenWord', TextType::class, [
                'required' => false,
                'attr' => [
                    'placeholder' => "écris ici"
                ],
                'label' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'csrf_protection' => false,
            'data_class' => WrittenWordDTO::class
        ]);
    }
}