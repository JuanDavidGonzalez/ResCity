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

            <div class="mb-2 text-right">
                <a href="{{route('user.create')}}" type="button" class="btn btn-primary">
                    <i class="fa fa-plus"></i>
                    Crear Usuario
                </a>
            </div>

            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Lista de Usuarios</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Fecha Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>juan.david.gonzalez@uao.edu.co</td>
                                        <td>{{$user->created_at}}</td>
                                        <td class="text-center">
                                            <a href="{{route('user.edit', $user->id)}}" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $users->links() }}
                {{--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
            </div>
        </div>
   </div>
@endsection
