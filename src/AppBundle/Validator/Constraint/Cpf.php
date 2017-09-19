<?php

namespace AppBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * A CPF Constraint.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class Cpf extends Constraint {
    
    /**
     *
     * @var array
     */
    public $message = array(
        'length' => 'O CPF deve ter 14 caracteres.',
        'pattern' => 'O CPF deve estar no formato "999.999.999-99"',
        'invalid' => 'CPF inválido.',
    );
    
}
