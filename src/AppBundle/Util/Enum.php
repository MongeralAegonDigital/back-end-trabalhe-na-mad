<?php

namespace AppBundle\Util;

class Enum {
    
    // tipos de status
    const EXCLUIDO = -1;
    const INATIVO = 0;
    const ATIVO = 1;

    // tipos de estado civil
    const EC_SOLTEIRO = 0;
    const EC_CASADO = 1;
    const EC_DIVORCIADO = 2;
    const EC_VIUVO = 3;
    
    // tipos de categoria
    const C_EMPREGADO = 0;
    const C_EMPREGADOR = 1;
    const C_AUTONOMO = 2;
    const C_OUTROS = 3;

    // sexo
    const MASCULINO = 1;
    const FEMININO = 2;
    
}
