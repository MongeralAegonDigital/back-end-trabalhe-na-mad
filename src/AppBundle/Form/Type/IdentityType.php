<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class IdentityType extends AbstractType {
    
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('number', TextType::class, array(
            'required' => true,
        ));
        $builder->add('agency', TextType::class, array(
            'required' => true,
        ));
        $builder->add('issuedAt', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Identity',
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
