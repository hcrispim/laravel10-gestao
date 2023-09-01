@extends('index');

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Clientes</h1>
    </div>
    <div>
        <br>
        <form action="{{ route('cliente.index') }}" method="get">
            <input type="text" name="pesquisar" placeholder="Digite o nome" />
            <button>Pesquisar</button>
            <a type="button" href="{{ route('cadastrar.cliente') }}" class="btn btn-success float-end">
                Incluir Cliente
            </a>
        </form>
        {{-- <h2>Tabela tal...</h2> --}}
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm">
                @if ($findCliente->isEmpty())
                    <p>Não existem dados</p>
                @else
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Endereço</th>
                            <th>Logradouro</th>
                            <th>CEP</th>
                            <th>Bairro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($findCliente as $cliente)
                            <tr>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->email }}</td>
                                <td>{{ $cliente->endereco }}</td>
                                <td>{{ $cliente->logradouro }}</td>
                                <td>{{ $cliente->cep }}</td>
                                <td>{{ $cliente->bairro }}</td>

                                <td>
                                    <a href="{{ route('atualizar.cliente', $cliente->id) }}" class="btn btn-light btn-sm"
                                        role="button">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <form id="form_{{ $cliente->id }}" method="post"
                                        action="{{ route('cliente.delete', ['id' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $cliente->id }}').submit()">
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
