@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Registar material</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('entradas.index') }}">Entradas de stock</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-md-12">
  <div class="card card-default">
    @include('layouts.flash-messages')
    <form method="POST" action="{{ route('material.store')}}">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-lg-6">
          <label for="nome">Nome do material</label>
          <select class="form-control select2bs4" style="width: 100%;" name="nome" required="" value="{{ old('nome') }}">
            <option disabled selected>Selecione o nome do material </option>
            @forelse ($materiais as $material)
                <option value="{{ $material->id }}">{{ $material->nome}}</option>
            @empty
            @endforelse
            @error('nome')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </select>
        </div>
        <div class="form-group col-lg-6">
          <label for="fornecedor">Nome do fornecedor</label>
          <select class="form-control select2bs4" style="width: 100%;" name="fornecedor" required="" value="{{ old('fornecedor') }}" style="width: 10%">
            <option disabled selected>Selecione o fornecedor </option>
            @forelse ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->fornecedor }}">{{ $fornecedor->fornecedor}}</option>
            @empty
            @endforelse
            @error('fornecedor')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </select>
        </div>
      </div>
      <div class="row">
          <div class="form-group col-sm-3 col-md-3">
            <label for="codigo">Código do material</label>
            <input type="text" class="form-control" name="codigo" required="" placeholder="Código do material" value="{{ old('codigo') }}">
              @error('codigo')
              <small class="text-danger">{{ $message }}</small>
              @enderror
            </select>
          </div>
          <div class="form-group col-sm-3 col-md-3">
            <label for="num_requisicao">Número da requisição</label>
            <input type="text" class="form-control" name="num_requisicao" required="" placeholder="Número de requisição" value="{{ old('num_requisicao') }}">
            @error('num_requisicao')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-sm-3 col-md-2">
            <label for="ordem_compra">Ordem da compra</label>
            <input type="text" class="form-control" name="ordem_compra" required="" placeholder="Ordem de compra" value="{{ old('ordem_compra') }}">
            @error('ordem_compra')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-sm-3 col-md-2">
            <label for="qtd_solicitada">Quantidade solicitada</label>
            <input type="text" class="form-control" name="qtd_solicitada" placeholder="Quantidade solicitada" value="{{ old('qtd_solicitada') }}">
            @error('qtd_solicitada')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group col-sm-3 col-md-2">
            <label for="qtd_recebida">Quantidade recebida</label>
            <input type="text" class="form-control" name="qtd_recebida" required="" placeholder="Quantidade recebida" value="{{ old('qtd_recebida') }}">
            @error('qtd_recebida')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-3 col-md-3">
          <label for="custo">Custo unitário</label>
          <input type="text" class="form-control" name="custo" placeholder="Custo unitário" value="{{ old('custo') }}">
          @error('custo')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-sm-3 col-md-9">
          <label for="comentario">Comentário</label>
          <input type="text" class="form-control" name="comentario" placeholder="Comentário" value="{{ old('comentario') }}">
          @error('comentario')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Registar</button>
    </div>
    </form>
  </div>
<!-- /.card -->
</div>
@endsection
