<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()->count(2)->create()->each(function ($project) {
            User::factory()->count(3)->create()->each(function ($user) use ($project) {
                $user->projects()->attach($project['id'], ['role' => 'superAdmin']);
            });
        });
    }
}
