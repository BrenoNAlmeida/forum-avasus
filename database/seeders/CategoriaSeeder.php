<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Categoria;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get("jsons/categorias.json");
        $data = json_decode($json, true);

        $arr = [];
        foreach ($data as $item) {
            array_push($arr, [
                'id' => $item['id'],
                'nome' => $item['nome'],
            ]);
        }
        Categoria::insert($arr);
    }
}
