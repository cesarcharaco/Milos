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
                                    <li><a href="{{ route('choferes.index') }}">Despachos</a></li>
                                    <li class="active">Registro Despacho de Camión</li>
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
                                <strong>Registro de Despacho de Camión para Hoy</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                <form action="{{ route('despachos.store') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="num_guia" class=" form-control-label"><b style="color: red;">*</b> Número de Guía</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="nombres" name="num_guia" placeholder="Ingrese el Número de Guía..." class="form-control" required="required" value="{{ old('num_guia') }}">
                                            @error('num_guia')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="patente" class=" form-control-label"><b style="color: red;">*</b> Patente</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="patente" name="patente" placeholder="Ingrese La Patente..." class="form-control" required="required" value="{{ old('patente') }}">
                                            @error('patente')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="id_chofer" class=" form-control-label"><b style="color: red;">*</b> Chofer</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="id_chofer" id="id_chofer" required="required">
                                                @foreach($choferes as $key)
                                                    @php $cont=0; @endphp
                                                    @foreach($despachos as $key2)
                                                        @if($key2->id_chofer==$key->id_chofer)
                                                            @php $cont++; @endphp
                                                        @endif
                                                    @endforeach
                                                    @if($cont==0)
                                                    <option value="{{ $key->id_chofer }}">{{ $key->chofer->apellidos }}, {{ $key->chofer->nombres }} - RUT: {{ $key->chofer->rut }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="kg_pesaje" class=" form-control-label"><b style="color: red;">*</b> Kgs de Pesaje</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="kg_pesaje" name="kg_pesaje" placeholder="Ingrese los Kilogramos de pesaje..." class="form-control" required="required" value="{{ old('kg_pesaje') }}">
                                            @error('kg_pesaje')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hora_salida" class=" form-control-label"><b style="color: red;">*</b> Hora de Salida</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="time" name="hora_salida" id="hora_salida" value="{{ $hora }}" step="1" class="form-control" required="required">
                                            @error('hora_salida')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="total_kg_salida" class=" form-control-label"><b style="color: red;">*</b>Total Kgs de Salida</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="total_kg_salida" name="total_kg_salida" placeholder="Ingrese el total de Kilogramos de salida..." class="form-control" required="required" value="{{ old('total_kg_salida') }}">
                                            @error('total_kg_salida')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="observaciones" class=" form-control-label">Observaciones</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="observaciones" name="observaciones" placeholder="Ingrese alguna observación pertinente..." class="form-control" value="{{ old('observaciones') }}">
                                            @error('observaciones')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
