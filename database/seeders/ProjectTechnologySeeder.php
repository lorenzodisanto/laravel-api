<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// importo faker
use Faker\Generator as Faker;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //prendiamo tutti i progetti
        $projects = Project::all();

        // prendiamo tutte le tecnologie come array di id
        $technologies = Technology::all()->pluck('id')->toArray();

        // per ognuno dei progetti aggiungo da 1 a 5 tecnologie
        foreach($projects as $project){
            $project
            ->technologies()
            ->attach($faker->randomElements($technologies,random_int(1, 5)));
        }
    }
}
