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
                                    <li><a href="{{ route('camiones.index') }}">Camiones</a></li>
                                    <li class="active">Registrar camión</li>
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
                                <strong>Registro de camión</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('camiones.store') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="modelo" class=" form-control-label"><b style="color: red;">*</b> Modelo</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="modelo" name="modelo" placeholder="Ingrese modelo..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="marca" class=" form-control-label"><b style="color: red;">*</b> Marca</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="marca" name="marca" placeholder="Ingrese marca..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="vin" class=" form-control-label"><b style="color: red;">*</b> Vin</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="vin" name="vin" placeholder="Ingrese vin..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="anio" class=" form-control-label"><b style="color: red;">*</b> Año</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="anio" name="anio" placeholder="Ingrese anio..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="capacidad" class=" form-control-label"><b style="color: red;">*</b> Capacidad</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="capacidad" name="capacidad" placeholder="Ingrese capacidad..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="status" class=" form-control-label"><b style="color: red;">*</b> Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="status" id="status">
                                                <option value="Activo">Activo</option>
                                                <option value="Taller">Taller</option>
                                                <option value="Retirado">Retirado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
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
