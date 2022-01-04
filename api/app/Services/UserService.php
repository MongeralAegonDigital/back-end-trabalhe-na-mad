<?php

namespace App\Services;

interface UserService
{

    public function getAll();

    public function create(array $user);

    public function emailIsUnique($email): bool;

    public function cpfIsValid(string $cpf): bool;
}
