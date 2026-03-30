<?php
namespace App\Form;

use App\Entity\Batiment;
use App\Entity\Incident;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class IncidentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', null, [
                'attr' => ['placeholder' => 'Ex: Ampoule grillée palier 2ème'],
            ])
            ->add('description', null, [
                'attr' => ['rows' => 4, 'placeholder' => 'Précisez le lieu et le problème...'],
            ])
            ->add('batiment', EntityType::class, [
                'class'        => Batiment::class,
                'placeholder'  => 'Choisissez votre bâtiment',
                'choice_label' => 'nom',
            ])
            ->add('photo_file', FileType::class, [
                'label'       => 'Ajouter une photo (facultatif)',
                'mapped'      => false,
                'required'    => false,
                'constraints' => [
                    new File([
                        'maxSize'          => '5M',
                        'mimeTypes'        => ['image/jpeg', 'image/png'],
                        'mimeTypesMessage' => 'Veuillez uploader une image JPG ou PNG valide',
                    ]), // Ferme le "new File"
                ],  // Ferme le tableau "constraints"
                'attr'        => ['class' => 'form-control'],
            ]); // 👈 ICI : On ferme bien le tableau d'options ET le ->add()
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Incident::class,
        ]);
    }
}
