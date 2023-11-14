<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class AccountSeeder extends AbstractSeed
{
    public function run(): void
    {
        $data = [
            "account_id" => fake()->uuid(),
            "name" => fake()->name(),
            "email" => fake()->email(),
            "cpf" => fake()->cpf(),
            "car_plate" => fake()->numerify('ABC-###'),
            "is_passenger" => false,
            "is_driver" => true,
            "is_verified" => true,
            "verification_code" => fake()->uuid()
        ];

        $posts = $this->table('accounts');
        $posts->insert($data)
            ->saveData();
    }
}
