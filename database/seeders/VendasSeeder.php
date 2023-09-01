<?php

namespace Database\Seeders;

use App\Models\Venda;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendasSeeder extends Seeder
{

    public function run(): void
    {
        Venda::create([
            'numero_da_venda' => 1,
            'produto_id' => 17,
            'cliente_id' => 4
        ]);

        Venda::create([
            'numero_da_venda' => 2,
            'produto_id' => 18,
            'cliente_id' => 5
        ]);

    }
}
