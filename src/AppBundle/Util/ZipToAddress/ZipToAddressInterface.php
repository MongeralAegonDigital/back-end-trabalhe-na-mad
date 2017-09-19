<?php

namespace AppBundle\Util\ZipToAddress;

/**
 *
 * @author Nilo Soares <nilosoares@gmail.com>
 */
interface ZipToAddressInterface {
    
    /**
     * Returns the address for some zip-code.
     * @param string $zipCode
     * @return mixed
     */
    public function getAddress($zipCode);
    
}
