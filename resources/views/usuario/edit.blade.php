@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Editar usuário</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('usuario.index') }}">Lista de Usuários</a></li>
          <li class="breadcrumb-item active"><a href="{{ route('usuario.create') }}">Registar Usuários</a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="col-md-12">
  <div class="card card-default">
    @include('layouts.flash-messages')
    <form method="POST" action="{{ route('usuario.update', $user->encode($user->id)) }}">
      @csrf
    <div class="card-body">
      <div class="row">
        <div class="form-group col-sm-4 col-md-4">
          <label for="name">Nome</label>
          <input type="name" class="form-control" name="name" placeholder="Nome" value="{{ $user->name }}" required>
          @error('name')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-sm-4 col-md-4">
          <label for="username">Nome do usuário</label>
          <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $user->username }}">
          @error('username')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-sm-4 col-md-4">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{ $user->email }}">
          @error('email')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="form-group col-sm-4 col-md-4">
          <label for="role">Nivel de Acesso</label>
          <select class="form-control" name="role">
            @foreach ($roles as $role)
            <option {{ $user->roles[0]->slug == $role->slug? 'selected':''}} value="{{ $role->slug}}">{{ $role->name }}</option>
            @endforeach
          </select>
          @error('role')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-sm-4 col-md-4">
          <label for="password">Senha</label>
          <input type="password" class="form-control" name="password" placeholder="Senha">
          @error('password')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="form-group col-sm-4 col-md-4">
          <label for="password_confirmation">Confirmar senha</label>
          <input type="password" class="form-control" name="password_confirmation" placeholder="Confirmar senha">
          @error('password_confirmation')
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
