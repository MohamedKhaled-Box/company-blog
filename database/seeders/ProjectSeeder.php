<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Faker::class);

        for ($i = 0; $i < 10; $i++) {
            Project::create([
                'user_id' => 1,
                'title' => $faker->catchPhrase,
                'description' => $faker->realTextBetween(160, 450, 2),
            ]);
        }
    }
}