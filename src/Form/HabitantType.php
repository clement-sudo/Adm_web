<?php

namespace App\Form;

use App\Entity\Habitant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class HabitantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('date_naissance', DateType::class, [
                'years' => range(date('Y') - 100, date('Y')),
                'months' => range(1, 12),
                'days' => range(1, 31),
                'format' => 'dd MM yyyy',
            ])
            ->add('genre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Habitant::class,
        ]);
    }
}