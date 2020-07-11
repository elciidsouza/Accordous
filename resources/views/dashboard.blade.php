@extends('app')

@section('content')

<div id="dashboard" class="row">
    <div class="col-md-12">
        <h1 class="page-header">Lista de Imóveis - Accordous</h1>
    </div>

    <div class="col-md-12">
        <a href="#" class="btn btn-primary float-right ml-4" data-toggle="modal" data-target="#criar-contrato">
            Criar novo Contrato
        </a>
        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#criar-imovel">
            Criar novo imóvel
        </a>
    </div>

    <div class="col-md-12 mt-4">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>E-mail do proprietário</th>
                    <th>Endereço do imóvel</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
                <tbody>
                    <tr v-for="item in imoveis">
                        <td>@{{item.id_imoveis}}</td>
                        <td>@{{item.email}}</td>
                        <td>@{{item.rua}}, @{{item.numero}}, @{{item.cidade}}, @{{item.estado}}</td>
                        <td>@{{item.status}}</td>
                        <td><a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteImoveis(item)">Remover</a></td>
                    </tr>
                </tbody>
            </thead>
        </table>
    </div>

    @include('criarImovel')
    @include('criarContrato')

    {{-- <div class="col-sm-12">
        <pre>
            @{{ $data }}
        </pre>
    </div> --}}

</div>

@endsection