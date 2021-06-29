<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Config::get('constants.categories.type.article');
        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category,
                'type' => 'article'
            ]);
        }
    }
}
