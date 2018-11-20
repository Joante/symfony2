<?php

namespace ProductoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('categorias');
        $builder->add('name', TextType::class, array('required' => true,
            'constraints' => new NotBlank()
        ));
        $builder->add('price', IntegerType::class ,array(
            'required' => true,
            'constraints' => new NotBlank()
        ));
        $builder->add('stock', IntegerType::class, array(
            'required' => true,
            'constraints' => new NotBlank()
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductoBundle\Entity\Producto'
        ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'productobundle_producto';
    }


}
