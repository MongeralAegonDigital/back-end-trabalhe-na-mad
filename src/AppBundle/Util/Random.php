<?php

namespace AppBundle\Util;

/**
 * Helper class to generate some random values.
 * @author Nilo Soares <nilosoares@gmail.com>
 */
class Random {
    
    /**
     * Returns a random string.
     * @param int $bytes
     * @return string
     */
    public static function generateString($bytes = 30) {
        $symbols = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $shuffle = str_shuffle($symbols);
        $random = substr($shuffle, 0, min($bytes, strlen($symbols)));
        return $random;
    }
    
    /**
     * Returns a random salt.
     * @param int $bytes
     * @return string
     */
    public static function generateSalt($bytes = 30) {
        if (function_exists("random_bytes")) {
            $random = random_bytes($bytes);
        }
        else {
            $random = self::generateString($bytes);
        }
        return base64_encode($random);
    }
    
}
