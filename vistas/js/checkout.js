function crearPedido(){
    console.log("estoy en checkout.js");

	$.ajax({
		type:"POST",
		data:$('#frmPedido').serialize(),
		url:"controladores/checkout.controlador.php",
        cache: false,
		success:function(respuesta){
			console.log(respuesta);	

			switch (respuesta) {
				case "ok":
					swal({
						type: "success",
						title: "Su pedido ha sido registrado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "inicio";
						}
					})	
					break;
				case "errorNombre":		
					swal("Nombre es invalido!");
					break;
				case "errorDireccion":		
					swal("dirección invalida!");
					break;
				case "errorCorreo":		
					swal("Correo invalido!");
					break;
				case "errorNombre":		
					swal("Nombre es invalido!");
					break;
				case "errorTelefono":		
					swal("Telefono invalido!");
					break;
				case "errorDocumento":		
					swal("Documento invalido!");
					break;				
				default:
					swal("Fallo al agregar!");
					break;
				
			}

		}
	});
}
