<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Dish;


class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Decodifica il file JSON
        $json = File::get(database_path('json/dishdata.json'));
        $data = json_decode($json);

        // Itera su ogni oggetto nel JSON e crea un nuovo record nel database per ogni piatto
        foreach ($data as $dish) {
            Dish::create([
                'name' => $dish->name,
                'price' => $dish->price,
                'desc' => $dish->desc,
            ]);
        }
    }
}