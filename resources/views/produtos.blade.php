@extends('layouts.mylayout')
{{--{{dd($products)}}--}}
@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th class="col-xs-6">Fornecedor</th>
                    <th class="col-xs-1">Produto</th>
                    <th class="col-xs-5 text-right">Qtde. em Estoque</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $p)
                <tr id="{{"product".$p->product_id}}" class="row">
                    <td class="col-xs-6">{{"Empresa".$loop->iteration}}{{--}}{{$p->provider->nome}}--}}</td>
                    <td class="col-xs-1">{{$p->nome}}</td>
                    <td class="col-xs-5 text-right">{{$p->estoque}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
