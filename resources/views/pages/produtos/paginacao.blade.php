@extends('index');

@section('content')

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
                                    <a class="btn btn-light btn-sm" href="#" role="button">
                                        Editar
                                    </a>
                                    {{-- <meta name='csrf-token' content="{{ csrf_token()}}" />
                                <a onclick="deleteRegistroPaginacao('{{route('produto.delete')}}', {{$produto->id}})"
                                   class="btn btn-danger btn-sm">Excluir
                                </a> --}}
                                    {{-- <a class="btn btn-danger btn-sm" href="{{ 'produto.delete',''}}" role="button">
                                    Excluir
                                </a> --}}
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
