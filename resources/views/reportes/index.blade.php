@extends('layouts.app')

@section('content')
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Reportes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Gráficas</a></li>
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
            
            <div class="card">
                <div class="card-header">
                    <strong>Filtro de busquedad de gráfica</strong>
                </div>
                <div class="card-body card-block">
                    <form action="#" method="post" class="form-inline">
                        <div class="form-group">
                            <label for="fecha_desde" class="pr-2  form-control-label">Fecha desde:</label>
                            <input type="date" id="fecha_desde" name="fecha_desde" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fecha_hasta" class="px-2 form-control-label">Fecha hasta:</label>
                            <input type="date" id="fecha_hasta" name="fecha_hasta" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="pr-2"></label>
                            <button class="btn btn-success btn-xs" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="clearfix"></div>
                <!-- Orders -->
                @php $despachos1=despachos(); @endphp
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Despachos y Entregas </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="serial">Nro. Guía</th>
                                                    <th class="avatar">Patente</th>
                                                    <th>Chofer</th>
                                                    <th>Kg pesaje</th>
                                                    <th>Hora de salida</th>
                                                    <th>Total Kgs de salidad</th>
                                                    <th>Status de Despacho</th>
                                                    <th>Status de Recepción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($despachos1 as $key)
                                                <tr>
                                                    <td>{{ $key->num_guia }}</td>
                                                    <td>{{ $key->patente }}</td>
                                                    <td>{{ $key->chofer->apellidos }}, {{ $key->chofer->nombres }} - RUT: {{ $key->chofer->rut }}</td>
                                                    <td>{{ $key->kg_pesaje }}</td>
                                                    <td>{{ $key->hora_salida }}</td>
                                                    <td>{{ $key->total_kg_salida }}</td>
                                                    <td>
                                                        @if($key->status=="Realizado")
                                                            <span class="badge badge-complete">{{ $key->status }}</span>
                                                        @else
                                                            <span class="badge badge-pending">{{ $key->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($key->recepciones->status=="No ha Llegado")
                                                            <span class="badge badge-secondary">{{ $key->recepciones->status }}</span>
                                                        @elseif($key->recepciones->status=="Recibido")
                                                            <span class="badge badge-success">{{ $key->recepciones->status }}</span>
                                                        @elseif($key->recepciones->status=="Cancelado")
                                                            <span class="badge badge-danger">{{ $key->recepciones->status }}</span>
                                                        @elseif($key->recepciones->status=="Devuelto")
                                                            <span class="badge badge-info">{{ $key->recepciones->status }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
                <!-- /.orders -->

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Gráfica de Despacho</strong>
                        </div>
                        <div class="card-body card-block">
                            <div style="width:100%; height: 50%;">
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
@endsection
