<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="text" id="txtCedula" name="txtCedula" placeholder="Cedula" />
		<input type="text" id="txtNombre" name="txtNombre" placeholder="Nombre" />
		<input type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono" />
		<input type="text" id="txtDireccion" name="txtDireccion" placeholder="Direccion" />
		<br>
		<button type="submit" id="btnGuardar" name="btnGuardar">Guardar</button>
		<button type="submit" id="btnModificar" name="btnModificar" style="display:none">Modificar</button>
	</form>

	<table>
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Telefono</th>
				<th>Direccion</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody>
			<?php echo $tabla; ?>
		</tbody>
	</table>

	<script type="text/javascript">
		function edit(cedula, nombre, telefono, direccion){

			document.getElementById("txtCedula").value = cedula;
			document.getElementById("txtNombre").value = nombre;
			document.getElementById("txtTelefono").value = telefono;
			document.getElementById("txtDireccion").value = direccion;

			document.getElementById("btnGuardar").style.display = "none";
			document.getElementById("btnModificar").style.display = "block";

		}
	</script>
</body>
</html>