<?php
namespace App\Http\External\Postmon;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostmonApi extends BaseController
{
    private $cep;

    public function __construct($cep)
    {
        $this->cep = $this->onlyNumbers($cep);

        if(count($this->cep) < 8) {
            return [];
        }
    }

    public function getAddress()
    {
        try {

            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => "http://api.postmon.com.br/v1/cep/".$this->cep,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: application/json"
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            $address = json_decode($response);

            if ($err || is_null($address)) {
                return json_encode([]);
            }

            return json_encode($address);


        } catch(\Exception $e) {
            return json_encode([]);
        }
    }

    private function onlyNumbers($string)
    {
        return preg_replace('/\D+/', '', $string);
    }
}
