@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lista de materiais</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('material.create') }}">Registar Material</a></li>
          <li class="breadcrumb-item"><a href="{{ route('entradas.index') }}">Entradas de stock</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card">
<div class="card-body">
  @include('layouts.flash-messages')
    <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nome do material</th>
                  <th>Ultima actualização de stock</th>
                  <th>Quantidade Aceitável</th>
                  <th>Quantidade Disponivel</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($materiais as $material)
                <tr>
                  <td>{{ $material->id }}</td>
                  <td>{{ $material->nome }}</td>
                  <td>{{ date("d-m-Y H:i",strtotime($material->updated_at)) }}</td>
                  <td>{{ $material->qtd_aceitavel == "" ? "N/F" : $material->qtd_aceitavel }}</td>
                  <td>{{ $material->qtd_disponivel }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nome do material</th>
                <th>Ultima actualização de stock</th>
                <th>Quantidade Aceitável</th>
                <th>Quantidade Disponivel</th>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>

@endsection
