<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Faker::class);
        Mail::create([
            'mail' => 'mohamedkhaledx22@gmail.com',
        ]);
        for ($i = 0; $i < 29; $i++) {
            Mail::create([
                'mail' => $faker->email,
            ]);
        }
    }
}