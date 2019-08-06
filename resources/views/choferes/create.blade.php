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
                                    <li><a href="{{ route('choferes.index') }}">Camiones</a></li>
                                    <li class="active">Registrar conductor</li>
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
                                <strong>Registro de conductor</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('choferes.store') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nombres" class=" form-control-label"><b style="color: red;">*</b> Nombre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nombres" name="nombres" placeholder="Ingrese nombres..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="apellidos" class=" form-control-label"><b style="color: red;">*</b> Apellidos</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese apellidos..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="rut" class=" form-control-label"><b style="color: red;">*</b> Rut</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="rut" name="rut" placeholder="Ingrese rut..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="edad" class=" form-control-label"><b style="color: red;">*</b> Edad</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="edad" name="edad" placeholder="Ingrese edad..." class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="genero" class=" form-control-label"><b style="color: red;">*</b> Género</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="genero" id="genero">
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="licencia" class=" form-control-label"><b style="color: red;">*</b> Licencia</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="licencia" id="licencia">
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="certificado" class=" form-control-label"><b style="color: red;">*</b> Certificado</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="certificado" id="certificado">
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>
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
                                                <option value="Reposo">Reposo</option>
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
