<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Componentes;
use Illuminate\Http\Request;
use App\Http\Requests\FormRequestCliente;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request) {
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        //dd($findProduto);
        return view ('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete($id)
    {
        //dd(Produto::find($id));
        Cliente::find($id)->delete($id);
        //return response()->json(['success' => true]);
        return redirect()->route('cliente.index');
    }

  //  public function cadastrarProduto(Request $request)
    public function cadastrarCliente(FormRequestCliente $request)
    {
        //dd($request);
        if ($request->method() == 'POST') {
            //dd($request);
            $data = $request->all();
            $componentes = new Componentes;
            Cliente::create($data);
            Toastr()->success('Gravado com sucesso!');
            return redirect()->route('cliente.index');

        }

        return view('pages.clientes.create');

    }

    public function atualizarCliente(FormRequestCliente $request, $id)
    {
            //dd($request);
            if ($request->method() == 'PUT') {
                //dd($request);
                $data = $request->all();
                $buscaRegistro = Cliente::find($id);
                $buscaRegistro->update($data);
                Toastr()->success('Atualizado com sucesso!');
                return redirect()->route('cliente.index');

            }
            $findCliente = Cliente::where('id', '=',$id)->first();
            return view('pages.clientes.atualiza', compact('findCliente'));

    }

}
