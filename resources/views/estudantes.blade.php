@extends('layouts.mylayout')

@section('title')
    Estudantes
@endsection

@section('styles')
    <style>
        .button-create{
            margin-top: 15px;
            margin-bottom: 40px;
        }
    </style>
@endsection

@section('content')


    <div id="modalCreate" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Criar Estudante</h4>
                </div>
                <form action="{{action('StudentController@store')}}" method="POST">
                    <div class="modal-body edit-content container-fluid">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="nome_input">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome_input">
                        </div>

                        <div class="form-group">
                            <label for="dre_input">DRE</label>
                            <input type="text" name="dre" id="dre_input" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary text-right">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container">

        <div class="col-xs-12" id='error-list'>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @elseif (session('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
        </div>

        <div class="text-center button-create">
            <button class="text-right btn btn-primary" type="button" data-href="#myModal" data-toggle="modal" data-target="#modalCreate">Criar Novo Estudante</button>
        </div>


        <table class="table table-striped">
            <thead>
                <tr class="row">
                    <th>Nome</th>
                    <th>DRE</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $s)
                    <tr class="row">
                        <td>{{$s->nome}}</td>
                        <td>{{$s->dre}}</td>
                        <td class="text-right">
                            <form action="{{action('StudentController@destroy',['estudante' => $s->id])}}" method="POST">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}

                                <button class="btn btn-danger" type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection