<?php
namespace App\Http\Controllers\User;

use App\Events\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Models\Address\Address;
use App\Models\User\Data;
use App\Models\User\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('created_at', 'desc')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        try {
            
            DB::beginTransaction();
            
            $user = User::create($request->except('data', 'address'));
            $address = $this->buildAddress($request->address, $request->cpf);
            $data = $this->buildData($request->data, $request->cpf);
            
            event(new CreateUser($user, $address, $data));
            
            DB::commit();

            return $user;
        } catch(\Exception $e) {
            DB::rollback();
            return response()->json(['Erro' => 'Ocorreu um erro ao criar o seu usuário <br/> '.$e->getMessage()]);
        }
    }

    private function buildAddress(array $request, $cpf)
    {
        try {
            $address = new Address();
            $address->fill($request);
            $address->user_cpf = $cpf;
            return $address;
        } catch(\Exception $e) {
            return false;
        }
    }
    
    private function buildData(array $request, $cpf)
    {
        try {
            $data = new Data();
            $data->fill($request);
            $data->user_cpf = $cpf;
            return $data;
        } catch(\Exception $e) {
            return false;
        }
    }
}
