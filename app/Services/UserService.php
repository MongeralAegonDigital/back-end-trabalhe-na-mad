<?php

namespace App\Services;

interface UserService
{

    public function getAll();

    public function create(array $user);
}
