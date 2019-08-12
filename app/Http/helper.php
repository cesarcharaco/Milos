<?php

function buscar_asignacion($id_chofer)
{
	$encontrado="No";

	$buscar=App\Asignaciones::where('id_chofer',$id_chofer)->where('status','Asignado')->first();

	if (!empty($buscar)) {
		$encontrado=$buscar->id_chofer;
	} 
	return $encontrado;
}

function buscar_camion($id_camion)
{
	$encontrado="No";

	$buscar=App\Asignaciones::where('id_camion',$id_camion)->first();

	if (!empty($buscar)) {
		$encontrado=$buscar->id_camion;
	} 
	return $encontrado;	
}

function despachos()
{
	$hoy=date('Y-m-d');
	$despachos=App\Despachos::where('fecha',$hoy)->get();
	 return $despachos;
}