<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CaisseInitialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('montantInitial', ChoiceType::class, [
                'label'    => 'Montant initial de la caisse',
                'choices'  => [
                    '200 €'  => 200,
                    '500 €'  => 500,
                    '1000 €' => 1000,
                    '2000 €' => 2000,
                    '3000 €' => 3000,
                    '5000 €' => 5000,
                ],
                'expanded' => true, // boutons radio
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}