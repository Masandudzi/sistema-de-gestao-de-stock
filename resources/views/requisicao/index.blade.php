@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Minhas Requisiçoes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('requisicao.create') }}">Requisitar Material</a></li>
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
                  <th>Nº Req</th>
                  <th>Data</th>
                  <th>Quantidade de material</th>
                  <th>Estado</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($requisicoes as $requisicao)
                <tr>
                  <td>{{ $requisicao->id }}</td>
                  <td>{{ date("d-m-Y H:i",strtotime($requisicao->created_at)) }}</td>
                  <td>{{ $requisicao->reason }}</td>
                  <td>{{ $requisicao->status }}</td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>Nº Req</th>
                <th>Data</th>
                <th>Quantidade de material</th>
                <th>Estado</th>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>

@endsection
