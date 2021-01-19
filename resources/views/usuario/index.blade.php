@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lista de usuários</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('usuario.create') }}">Registar Usuários</a></li>
          <li class="breadcrumb-item active">Lista de usuários</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card">
    <div class="card-body ">
      @include('layouts.flash-messages')
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                  <th>#</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Nome do usuario</th>
                  <th>Nivel de Acesso</th>
                  <th>Data do último acesso</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
              @php $num = 1; @endphp
              @foreach ($usuarios as $user)
                <tr>
                  <td>{{ $num }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email =="" ? "N/F" : $user->email }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->roles[0]->name }}</td>
                  <td>{{ $user->last_login_at == "" ? "-----" : date('d-m-Y h:i', strtotime($user->last_login_at)) }}</td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('usuario.edit', $user->encode($user->id)) }}"><i class="fa fa-lg fa-edit"></i></a>
                <a class="btn btn-danger" href="{{ route('usuario.destroy', $user->encode($user->id)) }}"><i class="fa fa-lg fa-trash"></i></a>
                  </td>
                </tr>
                @php $num ++; @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nome do usuario</th>
                <th>Nivel de Acesso</th>
                <th>Data do último acesso</th>
                <th></th>
              </tr>
            </tfoot>
          </table>
    </div>
  </div>
@endsection
