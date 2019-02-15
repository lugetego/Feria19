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
                'label'=>'Burbujas y Matemáticas',
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
                'label'=>'Dimensiones (IIES-UNAM)',
                'required'=>false,
            ))
            ->add('actividad6', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Divulgamat (Veracruz)',
                'required'=>false,
            ))
            ->add('actividad7', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Expo Mates',
                'required'=>false,
            ))
            ->add('actividad8', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Gato 3D y cubiloco',
                'required'=>false,
            ))
            ->add('actividad9', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Geografía y matemáticas (CIGA-UNAM)',
                'required'=>false,
            ))
            ->add('actividad10', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Teatromático',
                'required'=>false,
            ))
            ->add('actividad11', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Museo Matemático: IMAGINARIO',
                'required'=>false,
            ))
            ->add('actividad12', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Mosaicos en desorden (Penrose)',
                'required'=>false,
            ))

            ->add('actividad13', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Planetario (IRyA-UNAM)',
                'required'=>false,
            ))
            ->add('actividad14', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Rompecabezas pitagórico',
                'required'=>false,
            ))
            ->add('actividad15', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Pantalones locos y nudos',
                'required'=>false,
            ))
            ->add('actividad16', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Papiroacertijos',
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
