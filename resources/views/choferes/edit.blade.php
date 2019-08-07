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
                                    <li><a href="{{ route('choferes.index') }}">Conductores</a></li>
                                    <li class="active">Actualizar Conductor</li>
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
                                <strong>Actualización de Conductor</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                {!! Form::open(['route' => ['choferes.update',$chofer->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="nombres" class=" form-control-label"><b style="color: red;">*</b> Nombre</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nombres" name="nombres" placeholder="Ingrese nombres..." class="form-control" required="required" value="{{ $chofer->nombres }}">
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
                                            <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese apellidos..." class="form-control" required="required" value="{{ $chofer->apellidos }}">
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
                                            <input type="text" id="rut" name="rut" placeholder="Ingrese rut..." class="form-control" required="required" value="{{ $chofer->rut }}">
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
                                            <input type="number" id="edad" name="edad" placeholder="Ingrese edad..." class="form-control" min="18" max="80" required="required" value="{{ $chofer->edad }}" >
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
                                                <option value="Masculino" @if($chofer->genero=="Masculino") selected="selected" @endif >Masculino</option>
                                                <option value="Femenino" @if($chofer->genero=="Femenino") selected="selected" @endif >Femenino</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="licencia" class=" form-control-label"><b style="color: red;">*</b> Licencia</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="licencia" id="licencia" required="required">
                                                <option value="Si" @if($chofer->licencia=="Si") selected="selected" @endif >Si</option>
                                                <option value="No" @if($chofer->licencia=="No") selected="selected" @endif >No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="certificado" class=" form-control-label"><b style="color: red;">*</b> Certificado</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="certificado" id="certificado" required="required">
                                                <option value="Si" @if($chofer->certificado=="Si") selected="selected" @endif >Si</option>
                                                <option value="No" @if($chofer->certificado=="No") selected="selected" @endif >No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-actions form-group">
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
