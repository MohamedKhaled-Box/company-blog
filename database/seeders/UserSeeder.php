<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Faker::class);
        for ($i = 0; $i < 9; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('testtest'),
                'roles_name' => ["User"]
            ]);
            $user->assignRole('User');
        }
    }
}