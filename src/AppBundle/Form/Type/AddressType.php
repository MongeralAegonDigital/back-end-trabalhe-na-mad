<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class AddressType extends AbstractType {
    
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('route', TextType::class, array(
            'required' => true,
        ));
        $builder->add('number', TextType::class, array(
            'required' => true,
        ));
        $builder->add('complement', TextType::class, array(
            'required' => true,
        ));
        $builder->add('neighborhood', TextType::class, array(
            'required' => true,
        ));
        $builder->add('city', TextType::class, array(
            'required' => true,
        ));
        $builder->add('state', TextType::class, array(
            'required' => true,
        ));
        $builder->add('zipcode', TextType::class, array(
            'required' => true,
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Address',
            'allow_extra_fields' => true,
            'csrf_protection' => false,
        ));
    }
    
    /**
     * {@inheritDoc}
     */
    public function getBlockPrefix() {
        return null;
    }
    
}
