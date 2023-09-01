<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venda extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_da_venda',
        'produto_id',
        'cliente_id'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::Class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::Class);
    }


    public function getVendasPesquisarIndex(string $search = '')
    {
        $venda = $this->where(function ($query) use ($search) {
            if ($search) {
                $query->where('numero_da_venda', $search);
                $query->orwhere('numero_da_venda', 'LIKE', "%{$search}%");
            }
        })->get();
        return $venda;
    }
}



