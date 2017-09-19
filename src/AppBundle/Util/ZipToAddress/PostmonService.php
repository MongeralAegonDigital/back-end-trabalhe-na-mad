<?php

namespace AppBundle\Util\ZipToAddress;

/**
 * 
 *
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class PostmonService implements ZipToAddressInterface {
    
    /**
     * {@inheritDoc}
     */
    public function getAddress($zipCode) {
        $url = "http://api.postmon.com.br/v1/cep/" . $zipCode;
        $data = @file_get_contents($url);
        
        if ($data === false) {
            return array();
        }
        
        $array = json_decode($data, true);
        
        return array(
            'route' => isset($array['logradouro']) ? $array['logradouro'] : '',
            'neighborhood' => isset($array['bairro']) ? $array['bairro'] : '',
            'city' => isset($array['cidade']) ? $array['cidade'] : '',
            'state' => isset($array['estado']) ? $array['estado'] : '',
            'zipCode' => isset($array['cep']) ? $array['cep'] : '',
        );
    }
    
}
