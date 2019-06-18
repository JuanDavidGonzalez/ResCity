@extends('layouts.app')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Usuarios</li>
            </ol>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-user"></i>
                    Crear Usuario</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.store') }}">
                        <div class="form-group {{ $errors->has('email') ? ' is-invalid' : '' }}"">
                            <label> Nombre Completo:</label>
                            <input type="text" class="form-control"  placeholder="Nombre Completo" name="name">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label> Email: </label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" name="email">
                        </div>
                        <div class="form-group">
                            <label>Contraseña: </label>
                            <input type="password" class="form-control"  placeholder="xxxxxxxx" name="password">
                        </div>
                        <div class="form-group">
                            <label>Confirmar Contraseña: </label>
                            <input type="password" class="form-control"  placeholder="xxxxxxxx" name="password_confirmation ">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Crear Usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   </div>
@endsection

