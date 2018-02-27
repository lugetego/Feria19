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

            ->add('braille', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Matematicas y Braille',
                'required'=>false,
            ))
            ->add('burbujas', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Burbujas y Matemáticas',
                'required'=>false,
            ))
            ->add('canguro', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Canguro Matemático',
                'required'=>false,
            ))
            ->add('club', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Club de Mate',
                'required'=>false,
            ))
            ->add('dimensiones', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Dimensiones (IIES-UNAM)',
                'required'=>false,
            ))
            ->add('divulgamat', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Divulgamat (Veracruz)',
                'required'=>false,
            ))
            ->add('expo', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Expo Mates',
                'required'=>false,
            ))
            ->add('gato', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Gato 3D y cubiloco',
                'required'=>false,
            ))
            ->add('geografia', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Geografía y matemáticas (CIGA-UNAM)',
                'required'=>false,
            ))
            ->add('teatromatico', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Teatromático',
                'required'=>false,
            ))
            ->add('mosaicos', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Mosaicos en desorden (Penrose)',
                'required'=>false,
            ))
            ->add('museo', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Museo Matemático: IMAGINARIO',
                'required'=>false,
            ))
            ->add('pesca', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Planetario (IRyA-UNAM)',
                'required'=>false,
            ))
            ->add('rompecabezas', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Rompecabezas pitagórico',
                'required'=>false,
            ))
            ->add('topologia', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
                'label'=>'Pantalones locos y nudos',
                'required'=>false,
            ))
            ->add('papiroacertijos', 'Symfony\Component\Form\Extension\Core\Type\CheckboxType', array(
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
