<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Project;
use App\Models\Contributor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContributorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contributor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return
        [
            'user_id' => User::factory(3)->create()->first(),
            'project_id' => Project::factory(1)->create()->first(),
            'role' => 'superAdmin',
        ];
    }
}
