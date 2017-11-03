<?php
namespace App\Http\Controllers\Address;

use App\Http\Controllers\Controller;
use App\Http\Requests\Address\AddressRequest;
use App\Http\External\Postmon\PostmonApi;

class AddressController extends Controller
{
    public function findAddress(String $cep)
    {
        $postmon = new PostmonApi($cep);
        return $postmon->getAddress();
    }
}
