<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * 
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class ClientType extends AbstractType {
    
    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('address', AddressType::class, array(
            'required' => true,
        ));
        $builder->add('birthday', DateType::class, array(
            'required' => true,
            'widget' => 'single_text',
        ));
        $builder->add('cpf', CpfType::class, array(
            'required' => true,
        ));
        $builder->add('email', EmailType::class, array(
            'required' => true,
        ));
        $builder->add('gender', ChoiceType::class, array(
            'required' => true,
            'choices' => array(
                'Feminino' => 'Feminino',
                'Masculino' => 'Masculino',
            ),
        ));
        $builder->add('identity', IdentityType::class, array(
            'required' => true,
        ));
        $builder->add('maritalStatus', ChoiceType::class, array(
            'required' => true,
            'choices' => array(
                'Solteiro(a)' => 'Solteiro(a)',
                'Casado(a)' => 'Casado(a)',
                'Divorciado(a)' => 'Divorciado(a)',
                'Viúvo(a)' => 'Viúvo(a)',
                'Separado(a)' => 'Separado(a)',
                'Companheiro(a)' => 'Companheiro(a)',
            ),
        ));
        $builder->add('name', TextType::class, array(
            'required' => true,
        ));
        $builder->add('password', RepeatedType::class, array(
            'type' => PasswordType::class,
            'required' => true,
            'first_name' => 'password',
            'second_name' => 'confirm',
        ));
        $builder->add('phone', TextType::class, array(
            'required' => true,
        ));
        $builder->add('professionalInfo', ProfessionalInfoType::class, array(
            'required' => true,
        ));
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Client',
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
