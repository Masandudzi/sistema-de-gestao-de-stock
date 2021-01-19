@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Entradas de Stock</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('material.create') }}">Registar Material</a></li>
          <li class="breadcrumb-item"><a href="{{ route('material.index') }}">Lista de materiais</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card">
<div class="card-body">
  @include('layouts.flash-messages')
    <table id="tbl_entradas" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Data</th>
                  <th>Nome do material</th>
                  <th>Código</th>
                  <th>Nº da requisição</th>
                  <th>Ordem de compra</th>
                  <th>Fornecedor</th>
                  <th>Qtd solicitada</th>
                  <th>Qtd recebida</th>
                  <th>Usuário</th>
                </tr>
            </thead>
            <tbody>
              @php $num = 1; @endphp
              @foreach ($entradas as $entrada)
                <tr>
                  <td>{{ $num }}</td>
                  <td>{{ date('d-m-Y',strtotime($entrada->created_at)) }}</td>
                  <td>{{ $entrada->material->nome }}</td>
                  <td>{{ $entrada->codigo }}</td>
                  <td>{{ $entrada->num_requisicao }}</td>
                  <td>{{ $entrada->ordem_compra }}</td>
                  <td>{{ $entrada->fornecedor }}</td>
                  <td>{{ $entrada->qtd_solicitada }}</td>
                  <td>{{ $entrada->qtd_recebida }}</td>
                  <td>{{ $entrada->user->name }}</td>
                </tr>
                @php $num ++; @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Data</th>
                <th>Nome do material</th>
                <th>Código</th>
                <th>Nº da requisição</th>
                <th>Ordem de compra</th>
                <th>Fornecedor</th>
                <th>Qtd solicitada</th>
                <th>Qtd recebida</th>
                <th>Usuário</th>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>

@endsection
