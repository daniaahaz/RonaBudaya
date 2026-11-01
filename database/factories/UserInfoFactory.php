<?php

namespace Database\Factories;

use App\Models\UserInfo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserInfoFactory extends Factory
{
    protected $model = UserInfo::class;

    public function definition(): array
    {
        return [
            'UserName' => fake()->name(),
            'UserEmail' => fake()->unique()->safeEmail(),
            'UserPassword' => Hash::make('password'),
        ];
    }
}
