<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ProfessionalInfoType extends AbstractType {
    
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('category', ChoiceType::class, array(
            'required' => true,
            'choices' => array(
                'Empregado' => 'Empregado',
                'Empregador' => 'Empregador',
                'Autônomo' => 'Autônomo',
                'Outros' => 'Outros',
            ),
        ));
        $builder->add('company', TextType::class, array(
            'required' => true,
        ));
        $builder->add('profession', TextType::class, array(
            'required' => true,
        ));
        $builder->add('salary', MoneyType::class, array(
            'required' => true,
            'currency' => 'BRL',
            'grouping' => false,
            'scale' => 0,
            'divisor' => 1/100,
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProfessionalInfo',
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
