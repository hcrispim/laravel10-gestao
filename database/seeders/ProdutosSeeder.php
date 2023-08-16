<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdutosSeeder extends Seeder
{

    public function run(): void
    {
            Produto::create(
                [ 'nome' => 'Honorio Crispim',
                  'valor' => '10.2'
                ]
            );
    }
}
