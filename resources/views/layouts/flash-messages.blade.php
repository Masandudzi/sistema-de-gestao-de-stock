@if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


@if ($message = Session::get('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ $message }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif


@if ($message = Session::get('info'))
<div class="uk-alert-primary" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $message }}</p>
</div>
@endif


@if ($errors->any())
<div class="uk-alert-waring" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>{{ $message }}</p>
</div>
@endif
