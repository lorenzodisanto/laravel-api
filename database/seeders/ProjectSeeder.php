<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// importo faker
use Faker\Generator as Faker;
// importo facades string
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
        // aggiungo l'id della tipologia associata
        $types = Type::all()->pluck('id');

        for ($i=0; $i < 100; $i++) { 
            // assegnazione randomica del type_id dai types
            $type_id = $faker->randomElement($types);

            $project = new Project;
            $project->type_id = $type_id;
            $project->title = $faker->catchPhrase();
            $project->slug = Str::slug($project->title);
            $project->description = $faker->paragraph(2, true);
            $project->link = $faker->url();
            $project->save();
        }
    }
}
