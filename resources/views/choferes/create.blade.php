@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Registro</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('choferes.index') }}">Conductores</a></li>
                                    <li class="active">Registrar Conductor</li>
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
                        @include('flash::message')
                         @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            @include('flash::message')
                            <p>Corrige los siguientes errores:</p>
                            <ul>
                                @foreach ($errors->all() as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Registro de Conductor</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('choferes.store') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nombres" class=" form-control-label"><b style="color: red;">*</b> Nombre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nombres" name="nombres" placeholder="Ingrese nombres..." class="form-control" required="required" value="{{ old('nombres') }}">
                                            @error('nombres')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="apellidos" class=" form-control-label"><b style="color: red;">*</b> Apellidos</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese apellidos..." class="form-control" required="required" value="{{ old('apellidos') }}">
                                            @error('apellidos')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="rut" class=" form-control-label"><b style="color: red;">*</b> Rut</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="rut" name="rut" placeholder="Ingrese rut..." class="form-control" required="required" value="{{ old('rut') }}">
                                            @error('rut')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="edad" class=" form-control-label"><b style="color: red;">*</b> Edad</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="edad" name="edad" placeholder="Ingrese edad..." class="form-control" min="18" max="80" required="required" value="{{ old('edad') }}" >
                                            <small>La edad debe comprender entre 18 y 80 años</small>
                                            @error('edad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="genero" class=" form-control-label"><b style="color: red;">*</b> Género</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="genero" id="genero" required="required">
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
