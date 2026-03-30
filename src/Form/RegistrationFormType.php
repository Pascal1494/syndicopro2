<?php
namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Copropriete;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add('nom', TextType::class, [
                'label' => 'Votre Nom',
                'attr'  => ['placeholder' => 'Ex: Dupont'],
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Votre Prénom',
                'attr'  => ['placeholder' => 'Ex: Jean'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse Email',
            ])
            ->add('copropriete', EntityType::class, [
                'class'        => Copropriete::class,
                'choice_label' => 'nom',
                'label'        => 'Dans quelle résidence habitez-vous ?',
                'placeholder'  => '-- Sélectionnez votre résidence --',
                'expanded'     => true, // Boutons Radio
                'multiple'     => false,
                'mapped'       => false, // On s'en sert pour filtrer les bâtiments
            ])
            ->add('batiment', EntityType::class, [
                'class'        => Batiment::class,
                'choice_label' => 'nom',
                'label'        => 'Bâtiment',
                'placeholder'  => '-- Sélectionnez d\'abord une résidence --',
                'attr'         => ['class' => 'select-batiment'],
                'mapped'       => false,
            ])
            ->add('etage', IntegerType::class, [
                'label'  => 'Étage',
                'attr'   => ['placeholder' => 'Ex: 6'],
                'mapped' => false,
            ])
            ->add('porte', TextType::class, [
                'label'  => 'Position (Porte / Emplacement)',
                'attr'   => ['placeholder' => 'Ex: face, gauche...'],
                'mapped' => false,
            ])
            ->add('plainPassword', PasswordType::class, [
                'mapped'      => false,
                'label'       => 'Mot de passe',
                'attr'        => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank(['message' => 'Veuillez entrer un mot de passe']),
                    new Length([
                        'min'        => 6,
                        'minMessage' => 'Votre mot de passe doit faire au moins {{ limit }} caractères',
                        'max'        => 4096,
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'      => false,
                'label'       => 'J\'accepte les conditions d\'utilisation',
                'constraints' => [
                    new IsTrue(['message' => 'Vous devez accepter nos conditions.']),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
