@role('super-admin')
<li class="nav-item" style="color:white !important;">
  <a href="{{ route('usuario.index')}}" class="nav-link">
    <i class="nav-icon fas fa-users"></i>
    <p>
      Usuários
    </p>
  </a>
</li>
@endrole
@role('responsavel-do-armazem', 'super-admin')
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Material
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: none;">
    <li class="nav-item">
      <a href="{{ route('material.create') }}" class="nav-link">
        <i class="fa fa-database nav-icon"></i>
        <p>Registar Material</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('material.index') }}" class="nav-link">
        <i class="fa fa-list-ol nav-icon"></i>
        <p>Lista de Materiais</p>
      </a>
    </li>
  </ul>
</li>
<li class="nav-item" style="color:white !important;">
  <a href="{{ route('usuario.index')}}" class="nav-link">
    <i class="nav-icon fa fa-shopping-cart"></i>
    <p>
      Pedidos de Material
    </p>
  </a>
</li>
@endrole
<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fa fa-tasks"></i>
    <p>
      Requisição
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview" style="display: none;">
    <li class="nav-item">
      <a href="{{ route('requisicao.create') }}" class="nav-link">
        <i class="fa fa-cart-plus nav-icon"></i>
        <p>Requisitar Material</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('requisicao.index') }}" class="nav-link">
        <i class="fa fa-file nav-icon"></i>
        <p>Minhas requisiçoes</p>
      </a>
    </li>
  </ul>
</li>
