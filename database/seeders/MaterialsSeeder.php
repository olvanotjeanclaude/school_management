<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $materials = [];

        for ($i = 0; $i < rand(10, 18); $i++) {
            $materials[] = [
                "lesson_id" => rand(1, Lesson::count() - 1),
                "name" => "Material " . $i + 1,
                "week" => rand(1, 14),
                "material_type" => array_rand(Material::TYPES),
                "link" => fake()->url(),
                "description" =>fake()->paragraphs(rand(1,3),true)
            ];
        }

        Lesson::all()->each(function ($lesson) use($materials) {
            foreach ($materials as $key => $material) {
                $lesson->materials()->create($material);
            }
        });
    }
}
