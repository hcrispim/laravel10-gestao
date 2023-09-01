<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestVenda;

class VendasController extends Controller
{
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view ('pages.vendas.paginacao', compact('findVenda'));
    }

    public function delete($id)
    {
        //dd(Produto::find($id));
        Venda::find($id)->delete($id);
        //return response()->json(['success' => true]);
        return redirect()->route('venda.index');
    }

  //  public function cadastrarProduto(Request $request)
    public function cadastrarVenda(FormRequestVenda $request)
    {
        //dd($request);
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();
        if ($request->method() == 'POST') {
            //dd($request);
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            //dd($data);
            Venda::create($data);
            Toastr()->success('Gravado com sucesso!');
            return redirect()->route('venda.index');

        }

        //dd($findNumeracao);
        return view('pages.vendas.create', compact('findNumeracao','findProduto','findCliente'));

    }
}
