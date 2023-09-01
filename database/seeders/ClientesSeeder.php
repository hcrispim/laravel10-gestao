<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create(
            [ 'nome' => 'Honorio Crispim',
              'email' => 'hcrispim@gmail.com',
              'endereco' => 'shigs 715',
              'logradouro' => 'Asa Sul',
              'cep' => '222333',
              'bairro' => 'Hospitais'
            ]
        );
        Cliente::create(
            [ 'nome' => 'Teste Crispim',
              'email' => 'htestecrispim@gmail.com',
              'endereco' => 'shigs 715 teste',
              'logradouro' => 'Asa Sul teste',
              'cep' => '222333',
              'bairro' => 'Hospitais teste'
            ]
        );

    }
}
