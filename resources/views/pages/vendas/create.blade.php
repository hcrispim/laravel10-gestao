@extends('index')

@section('script')
    <script>
        $(document).ready(function($) {
            $('#mascara_valor').mask('#.##0,00', {
                reverse: true
            })
        });
    </script>
@endsection

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar nova Venda</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Numeração</label>
            <input type="text" disabled value="{{ $findNumeracao }}"
                class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda" />
            {{-- @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback"> {{ $errors->first('numero_da_venda') }} </div>
            @endif --}}
        </div>

        <div class="mb-3">
            <label class="form-label">Produto</label>
            <select class="form-select" name="produto_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findProduto as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select class="form-select" name="cliente_id">
                <option selected>Clique para selecionar</option>
                @foreach ($findCliente as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>


        {{-- <div class="mb-3">
            <label class="form-label">Email</label>
            <input id="email" name="email" value="{{ @old('email') }}"
                class="form-control @error('email') is-invalid @enderror" />
            @if ($errors->has('email'))
                <div class="invalid-feedback"> {{ $errors->first('email') }} </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">CEP</label>
            <input id="cep" name="cep" value="{{ @old('cep') }}"
                class="form-control @error('cep') is-invalid @enderror" />
            @if ($errors->has('cep'))
                <div class="invalid-feedback"> {{ $errors->first('cep') }} </div>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Endereço</label>
            <input id="endereco" name="endereco" value="{{ @old('endereco') }}"
                class="form-control @error('cep') is-invalid @enderror" />
            @if ($errors->has('endereco'))
                <div class="invalid-feedback"> {{ $errors->first('endereco') }} </div>
            @endif
        </div> --}}

        <button type="submit" class="btn btn-success">CADASTRAR</button>

    </form>
@endsection
