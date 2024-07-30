<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Project;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ProjectInteractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = app(Faker::class);
        $projects = Project::all();
        $users = User::where('id', '>', '1')->get();
        foreach ($projects as $project) {
            foreach ($users as $user) {
                $comment = new Comment();
                $comment->body = $faker->text;
                $comment->user_id = $user->id;
                $comment->project_id = $project->id;
                $comment->save();
                $like = new Like();
                $like->project_id = $project->id;
                $like->user_id = $user->id;
                $like->like = rand(0, 1);
                $like->save();
            }
        }
    }
}