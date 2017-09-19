<?php

namespace AppBundle\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * A CPF Validator.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class CpfValidator extends ConstraintValidator {
    
    /**
     * 
     * @param mixed $value
     * @param Constraint $constraint
     * @return null
     */
    public function validate($value, Constraint $constraint) {
        if ($value === null) {
            return;
        }
        
        // check for length
        if (strlen($value) !== 14) {
            $this->context->addViolation($constraint->message['length']);
            return;
        }

        // check pattern
        if (!preg_match('/^([0-9]{3})\.([0-9]{3})\.([0-9]{3})\-([0-9]{2})$/', $value)) {
            $this->context->addViolation($constraint->message['pattern']);
            return;
        }

        // remove . and -
        $cpf = preg_replace("/[^0-9]/", "", $value);
        
        // 000000000-00, 111111111-11... are invalids
        for ($i = 0; $i <= 9; $i++) {
            if (str_repeat($i, 11) == $cpf) {
                $this->context->addViolation($constraint->message['invalid']);
                return;
            }
        }

        // calculate digits
        $d1 = $d2 = 0;
        for ($i = 0, $j = 11; $i <= 8; $i++, $j--) {
            $d1 += $cpf[$i] * ($j - 1);
            $d2 += $cpf[$i] * $j;
        }
        $d2 += $cpf[$i] * $j;

        // checks digits
        $c1 = ($d1 % 11 < 2) ? 0 : 11 - ($d1 % 11);
        $c2 = ($d2 % 11 < 2) ? 0 : 11 - ($d2 % 11);
        if ($c1 != $cpf[9] || $c2 != $cpf[10]) {
            $this->context->addViolation($constraint->message['invalid']);
            return;
        }
    }

}
