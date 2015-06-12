$(function(){
	miPrimerAjax.Guardar();
});

var miPrimerAjax = {

	Guardar:function(){

		$("#btnGuardar").click(function(){

			$.ajax({
				'type':'post',
				'dataType':'html',
				'url':'ajaxController.php',
				// 'data':{
				// 	'nombre':$("#txtNombre").val()
				// },
				'data': new FormData(document.getElementById("frmDatos")),
				'processData': false,
        		'contentType': false
			}).done(function(angulo){

				$("#resultado").html(angulo);
				console.log(angulo);
			}).fail(function(error){

				alert(error.responseText);

			});

		});

	}

}