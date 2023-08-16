<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestProduto;

class ProdutosController extends Controller
{
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view ('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete($id)
    {
        //dd(Produto::find($id));
        Produto::find($id)->delete($id);
        //return response()->json(['success' => true]);
        return redirect()->route('produto.index');
    }

  //  public function cadastrarProduto(Request $request)
    public function cadastrarProduto(FormRequestProduto $request)
    {
        //dd($request);
        if ($request->method() == 'POST') {
            //dd($request);
            $data = $request->all();
            Produto::create($data);
            return redirect()->route('produto.index');

        }

        return view('pages.produtos.create');

    }



}
