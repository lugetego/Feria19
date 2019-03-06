<?php

namespace RegistroBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ActividadType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('actividad1', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Matematicas y Braille',
                'required'=>false,
            ))
            ->add('actividad2', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Burbujas',
                'required'=>false,
            ))
            ->add('actividad3', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Canguro Matemático',
                'required'=>false,
            ))
            ->add('actividad4', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Club de Mate',
                'required'=>false,
            ))
            ->add('actividad5', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Laberintos y Superficies',
                'required'=>false,
            ))
            ->add('actividad6', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Túneles bajo el suelo - IIES',
                'required'=>false,
            ))
            ->add('actividad7', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Expo Mates (Algoritmos)',
                'required'=>false,
            ))
            ->add('actividad8', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Papiroflexia',
                'required'=>false,
            ))
            ->add('actividad9', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Geometría euclidiana y Geografía - CIGA',
                'required'=>false,
            ))
            ->add('actividad10', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'ARTEMAT - IM Cuernavaca',
                'required'=>false,
            ))
            ->add('actividad11', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Museo Matemático',
                'required'=>false,
            ))
            ->add('actividad12', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Mosaicos en Desorden (Penrose)',
                'required'=>false,
            ))
            ->add('actividad13', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Máquina de Galton y Astronomía/Planetario - IRyA',
                'required'=>false,
            ))
            ->add('actividad14', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Matemagia con cartas',
                'required'=>false,
            ))
            ->add('actividad15', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Nudos y Pantalones locos',
                'required'=>false,
            ))
            ->add('actividad16', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'El fotón en su laberinto - IGUM',
                'required'=>false,
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RegistroBundle\Entity\Registro',
            ));
   }

    /**
     * @return string
     */
    public function getName()
    {
        return 'registrobundle_actividad';
    }


}
