@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Actualización</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('camiones.index') }}">Camiones</a></li>
                                    <li class="active">Actualizar Camión</li>
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
                                <strong>Actualización de Camión</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                {!! Form::open(['route' => ['camiones.update',$camion->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="modelo" class=" form-control-label"><b style="color: red;">*</b> Modelo</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="modelo" name="modelo" placeholder="Ingrese modelo..." class="form-control" required="required" value="{{ $camion->modelo }}">
                                            @error('modelo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="marca" class=" form-control-label"><b style="color: red;">*</b> Marca</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="marca" name="marca" placeholder="Ingrese marca..." class="form-control" required="required" value="{{ $camion->marca }}">
                                            @error('marca')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="vin" class=" form-control-label"><b style="color: red;">*</b> Vin</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="vin" name="vin" placeholder="Ingrese vin..." class="form-control" required="required" value="{{ $camion->vin }}">
                                            @error('vin')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="anio" class=" form-control-label"><b style="color: red;">*</b> Año</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="anio" name="anio" placeholder="Ingrese anio..." class="form-control" required="required" value="{{ $camion->anio }}">
                                            @error('anio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="capacidad" class=" form-control-label"><b style="color: red;">*</b> Capacidad (kgs)</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="capacidad" name="capacidad" placeholder="Ingrese capacidad..." class="form-control" required="required" value="{{ $camion->capacidad }}">
                                            @error('capacidad')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Actualizar
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Cancelar
                                        </button>
                                    </div>
                                {!! Form::close() !!}
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
