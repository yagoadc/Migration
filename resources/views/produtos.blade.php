@extends('layouts.mylayout')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th class="col-xs-3">Fornecedor</th>
                    <th class="col-xs-3">Produto</th>
                    <th class="col-xs-3">Qtde. em Estoque</th>
                    <th class="col-xs-3 text-right">Preço</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $p)
                <tr id="{{"product".$p->product_id}}" class="row">
                    <td class="col-xs-3">{{"Empresa".$loop->iteration}}{{--{{$p->fornecedor->nome}}--}}</td>
                    <td class="col-xs-4">{{$p->nome}}</td>
                    <td class="col-xs-2">{{$p->estoque}}</td>
                    <td class="col-xs-3 text-right">{{"R$ ".$p->preco}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
