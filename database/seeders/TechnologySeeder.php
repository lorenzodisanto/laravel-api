<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importo faker
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        //array di labels predefinite
        $labels = ["GIT", "HTML", "CSS", "JavaScript", "PHP", "SQL", "Blade"];

        foreach($labels as $label) {
          $technology = new Technology();
          $technology->label = $label;
          $technology->color = $faker->hexColor();
          $technology->save();
        }
    }
}
