<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = Str::random(10);
        return [
            'name' => 'Wonderful project ' . $name,
            'description' => 'Wonderful description ' . Str::random(10),
            'slug' => strtolower($name),
        ];
    }
}
