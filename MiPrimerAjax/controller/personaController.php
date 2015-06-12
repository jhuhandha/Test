<?php 
	require '../config/configDB.php';
	require '../library/database.php';
	require '../model/MiPrimerTabla.php';
	
	$tabla = "";

	$MPT = new MiPrimerTabla();

	if(isset($_POST["btnGuardar"])){

		$MPT->__SET("_Cedula",$_POST["txtCedula"]);
		$MPT->__SET("_Nombre",$_POST["txtNombre"]);
		$MPT->__SET("_Telefono",$_POST["txtTelefono"]);
		$MPT->__SET("_Direccion",$_POST["txtDireccion"]);

		if($MPT->Guardar()){
			echo "<script>alert('Guardo')</script>";
		}else{
			echo "<script>alert('No')</script>";
		}
	}

	$result = $MPT->Listar();
	foreach ($result as $value) {
		$tabla .= sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
							$value["cedula"],
							$value["nombre"],
							$value["telefono"],
							$value["direccion"],
							'<a onclick="edit('."'".$value["cedula"]."',"."'".$value["nombre"]."',"."'".$value["telefono"]."',"."'".$value["direccion"]."'".')">Editar</a>'
		);
	}



	include '../view/Persona/index.php';
?>