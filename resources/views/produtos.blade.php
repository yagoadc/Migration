@extends('layouts.mylayout')


@section('styles')
    <style>
        .info{
            font-size: 20px;
        }

        tr.click-row {
            cursor: pointer;
        }
    </style>
@endsection


@section('content')
    @foreach($products as $p)
        <div id="modal{{$p->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Lojas vendendo {{$p->nome}}</h4>
                    </div>
                    <div class="modal-body edit-content container-fluid">

                            <table class="table table-striped">
                                <thead>
                                <tr class="row">
                                    <th class="col-xs-3">Loja</th>
                                    <th class="col-xs-4">Qtde. em estoque</th>
                                    <th class="col-xs-2">Preço</th>
                                    <th class="col-xs-3 text-right">CEP</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($p->lojas as $l)
                                    <tr class="row">
                                        <td class="col-xs-3">{{$l->nome}}</td>
                                        <td class="col-xs-4">{{$l->pivot->estoque}}</td>
                                        <td class="col-xs-2">{{'R$ '.$l->pivot->preco}}</td>
                                        <td class="col-xs-3 text-right">{{$l->cep}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <div class="container">
       <span style='padding-right:5px;' class="glyphicon glyphicon-question-sign pull-right info"
             data-toggle="tooltip" title data-original-title="Clique em um produto para ver as lojas em que ele está disponível.">
       </span>
        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th class="col-xs-3">Fornecedor</th>
                    <th class="col-xs-3">Produto</th>
                    <th class="col-xs-3">Fabricante</th>
                    <th class="col-xs-3 text-right">Cód. de Barras</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $p)
                    <tr id="{{$p->id}}" class="row click-row" data-href="#myModal" data-toggle="modal" data-target="#modal{{$p->id}}">
                        <td class="col-xs-3">{{$p->fornecedor->nome}}</td>
                        <td class="col-xs-4">{{$p->nome}}</td>
                        <td class="col-xs-2">{{$p->fabricante}}</td>
                        <td class="col-xs-3 text-right">{{$p->cod_barras}}</td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection

@section('script-tooltip')
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip({
                placement : 'right'
            });
        });
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function($) {
            $(".click-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@endsection