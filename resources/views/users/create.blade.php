@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tablero</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('users.index') }}">Usuarios</a></li>
                                    <li class="active">Registrar usuario</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Registro de usuario</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label"><b style="color: red;">*</b> Nombre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="name" name="name" placeholder="Ingrese nombre..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label"><b style="color: red;">*</b> Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="email" id="email" name="email" placeholder="Ingrese Email..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="password" class=" form-control-label"><b style="color: red;">*</b> Password</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="password" id="password" name="password" placeholder="Ingrese contraseña..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="user_type" class=" form-control-label"><b style="color: red;">*</b> Tipo de usuario</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="user_type" id="user_type">
                                                <option value="Admin">Admin</option>
                                                <option value="Despachador">Despachador</option>
                                                <option value="Receptor">Receptor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="status" class=" form-control-label"><b style="color: red;">*</b> Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="status" id="status">
                                                <option value="Activo">Activo</option>
                                                <option value="Inactivo">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Registrar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Widgets -->
                <div class="clearfix"></div>
            </div>
            <!-- .animated -->
        </div>
@endsection
