@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Requisitar material</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('requisicao.index') }}">Minhas Requisicoes</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-md-12">
  <div class="card card-default">
    @include('layouts.flash-messages')
    <form method="POST" action="{{ route('requisicao.store')}}">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-lg-6">
          <label for="nome">Nome do material</label>
          <input type="text" class="form-control" name="nome[]" required="">
        </div>
        <div class="form-group col-lg-2">
          <label for="qtd">Quantidade</label>
          <input type="number" class="form-control" name="qtd[]" required="" min="1">
        </div>
        <div class="form-group col-lg-2">
          <button id="add-fields" style="margin-top:35px;"type="button" class="btn btn-info btn-sm">
            <i class="fa fa-plus" aria-hidden="true"></i>
          </button>
        </div>
      </div>
      <div id="dynamic-fields">

      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Requisitar</button>
    </div>
    </form>
  </div>
<!-- /.card -->
</div>
@endsection
