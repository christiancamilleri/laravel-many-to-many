<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $project = new Project();

            $project->name = $faker->sentence(3);
            $project->description = $faker->text(400);
            $project->link_repo = $faker->text(100);
            $project->slug = Str::slug($project->name, '-');
            $project->save();
        }
    }
}
