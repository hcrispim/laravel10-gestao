@extends('index');

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div>
        <br>
        <form action="{{ route('produto.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.produto') }}" class="btn btn-success float-end">
                Incluir Produto
            </a>
        </form>
        {{-- <h2>Tabela tal...</h2> --}}
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm">
                @if ($findProduto->isEmpty())
                    <p>Não existem dados</p>
                @else
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findProduto as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ 'RS' . ' ' . number_format($produto->valor, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('atualizar.produto', $produto->id) }}" class="btn btn-light btn-sm"
                                        role="button">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <form id="form_{{ $produto->id }}" method="post"
                                        action="{{ route('produto.delete', ['id' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $produto->id }}').submit()">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

            </table>
            @endif
        </div>
    </div>
@endsection
