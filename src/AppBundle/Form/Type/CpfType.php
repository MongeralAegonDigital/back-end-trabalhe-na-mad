<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Validator\Constraint\Cpf as CpfConstraint;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class CpfType extends AbstractType {
    
    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'label' => 'CPF',
            'constraints' => array(
                new CpfConstraint(),
            ),
        ));
    }
    
    /**
     * {@inheritDoc}
     */
    public function getParent() {
        return TextType::class;
    }
    
}
