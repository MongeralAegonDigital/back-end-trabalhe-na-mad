<?php
/**
 * Created by PhpStorm.
 * User: eltonc.dev
 * Date: 13/12/2017
 * Time: 23:46
 */

namespace App;


class Error
{
    protected $code;
    protected $name;
    protected $message;

    /**
     * Error constructor.
     * @param $code
     * @param $name
     * @param $message
     */
    public function __construct($code, $name, $message)
    {
        $this->code = $code;
        $this->name = $name;
        $this->message = $message;
    }

    public function __toString()
    {
        $info = [
            'code' => $this->code,
            'name' => $this->name,
            'message' => $this->message
        ];

        return json_encode($info);
    }


}