@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Registrar Recepción</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{ route('recepciones.index') }}">Recepción</a></li>
                                    <li class="active">Registro de Recepción de Camión</li>
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
                                <strong>Registro de Recepción de Camión</strong> <small>Todos los campos (<b style="color:red;">*</b>) son requeridos.</small>
                            </div>
                            <div class="card-body card-block">
                                {!! Form::open(['route' => ['recepciones.update',$despacho->id], 'method' => 'PUT', 'name' => 'form', 'id' => 'form','data-parsley-validate', 'class'=>'form-horizontal', 'enctype' =>'multipart/form-data']) !!}
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="num_guia_romana" class=" form-control-label"> Número de Guía Romana</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="num_guia_romana" name="num_guia_romana" class="form-control" readonly="readonly" value="{{ $despacho->num_guia }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="patente" class=" form-control-label"> Patente</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="patente" name="patente" class="form-control" readonly="readonly" value="{{ $despacho->patente }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="id_chofer" class=" form-control-label">Chofer</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="chofer" name="chofer" placeholder="Ingrese La Patente..." class="form-control" readonly="readonly" value="{{ $despacho->chofer->apellidos }}, {{ $despacho->chofer->nombres }} - RUT: {{ $despacho->chofer->rut }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="kg_pesaje_saida" class=" form-control-label">Kgs de Pesaje de Salida</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="kg_pesaje_saida" name="kg_pesaje_saida" placeholder="Ingrese los Kilogramos de pesaje de Salida..." class="form-control" readonly="readonly" value="{{ $despacho->kg_pesaje }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="kg_pesaje" class=" form-control-label"><b style="color: red;">*</b> Kgs de Pesaje de Llegada</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="kg_pesaje" name="kg_pesaje" placeholder="Ingrese los Kilogramos de pesaje de llegada..." class="form-control" required="required" @if($despacho->recepciones->kg_pesaje=="") value="{{ $despacho->kg_pesaje }}" @else value="{{ $despacho->recepciones->kg_pesaje }}" @endif>
                                            @error('kg_pesaje')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hora_salida" class=" form-control-label">Hora de Salida</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="hora_salida" id="hora_salida" value="{{ $despacho->hora_salida }}" step="1" class="form-control" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="hora_salida" class=" form-control-label"><b style="color: red;">*</b> Hora de Llegada</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="time" name="hora_llegada" id="hora_llegada" @if($despacho->recepciones->hora_llegada=="") value="{{ $hora }}" @else value="{{ $despacho->recepciones->hora_llegada }}" @endif step="1" class="form-control" required="required">
                                            @error('hora_llegada')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="total_kg_salida" class=" form-control-label">Total Kgs de Salida</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="total_kg_salida" name="total_kg_salida"class="form-control" readonly="readonly" value="{{ $despacho->total_kg_salida }}">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="total_kg_entrega" class=" form-control-label"><b style="color: red;">*</b>Total Kgs de Entrega</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="total_kg_entrega" name="total_kg_entrega" placeholder="Ingrese el total de Kilogramos de Llegada..." class="form-control" required="required" @if($despacho->recepciones->total_kg_entrega=="") value="{{ $despacho->total_kg_salida }}" @else value="{{ $despacho->recepciones->total_kg_entrega }}" @endif>
                                            @error('total_kg_entrega')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="status" class=" form-control-label"><b style="color: red;">*</b> Status</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" name="status" id="status" required="required">
                                                @if($despacho->recepciones->status=="No ha Llegado")
                                                <option value="Recibido">Recibido</option>
                                                <option value="Cancelado">Cancelado</option>
                                                <option value="Devuelto">Devuelto</option>
                                                @else
                                                <option value="Recibido" @if($despacho->recepciones->status=="Recibido") selected="selected" @endif >Recibido</option>
                                                <option value="Cancelado" @if($despacho->recepciones->status=="Cancelado") selected="selected" @endif >Cancelado</option>
                                                <option value="Devuelto" @if($despacho->recepciones->status=="Devuelto") selected="selected" @endif >Devuelto</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="observaciones" class=" form-control-label">Observaciones</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="observaciones" name="observaciones" placeholder="Ingrese alguna observación pertinente..." class="form-control" @if($despacho->recepciones->observaciones!=="") value="{{ $despacho->recepciones->observaciones }}" @endif>
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
