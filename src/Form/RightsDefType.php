<?php

namespace App\Form;

use App\Entity\RightsDef;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RightsDefType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('entity')
            ->add('libelle')
            ->add('module')
            ->add('perms')
            ->add('subperms')
            ->add('type')
            ->add('bydefault')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RightsDef::class,
        ]);
    }
}
