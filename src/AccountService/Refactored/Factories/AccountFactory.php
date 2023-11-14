<?php

namespace App\AccountService\Refactored\Factories;


class AccountFactory
{

    public static function make()
    {
        return [
            'nome' => fake()->name(),
            'email' => fake()->email(),
            'cpf' => fake()->cpf()
        ];
    }
}
