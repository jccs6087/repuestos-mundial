/*=============================================
CARGAR LA TABLA DINÁMICA DE PRODUCTOS
=============================================*/

$.ajax({

	url: "ajax/datatable-productos.ajax.php",
	success:function(respuesta){
		
		// console.log("respuesta", respuesta);

	}

})

var perfilOculto = $("#perfilOculto").val();

$('.tablaProductos').DataTable( {
    "ajax": "ajax/datatable-productos.ajax.php?perfilOculto="+perfilOculto,
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

/*=============================================
CAPTURANDO LA CATEGORIA PARA ASIGNAR CÓDIGO
=============================================*/
// $("#nuevaCategoria").change(function(){

// 	var idCategoria = $(this).val();

// 	var datos = new FormData();
//   	datos.append("idCategoria", idCategoria);

//   	$.ajax({

//       url:"ajax/productos.ajax.php",
//       method: "POST",
//       data: datos,
//       cache: false,
//       contentType: false,
//       processData: false,
//       dataType:"json",
//       success:function(respuesta){

//       	if(!respuesta){

//       		var nuevoCodigo = idCategoria+"01";
//       		$("#nuevoCodigo").val(nuevoCodigo);

//       	}else{

//       		var nuevoCodigo = Number(respuesta["codigo"]) + 1;
//           	$("#nuevoCodigo").val(nuevoCodigo);

//       	}
                
//       }

//   	})

// })

/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".nuevoPorcentaje").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(this).val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked",function(){

	$("#nuevoPrecioVenta").prop("readonly",false);
	$("#editarPrecioVenta").prop("readonly",false);

})

$(".porcentaje").on("ifChecked",function(){

	$("#nuevoPrecioVenta").prop("readonly",true);
	$("#editarPrecioVenta").prop("readonly",true);

})

/*=============================================
SUBIENDO LA FOTO DEL PRODUCTO
=============================================*/

$(".nuevaImagen").change(function(){

	var imagen = this.files[0];

	
	/*=============================================
	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
	=============================================*/
	
	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){
		
		$(".nuevaImagen").val("");
		
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen debe estar en formato JPG o PNG!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		
	}else if(imagen["size"] > 2000000){
		
		$(".nuevaImagen").val("");
		
		swal({
			title: "Error al subir la imagen",
			text: "¡La imagen no debe pesar más de 2MB!",
			type: "error",
			confirmButtonText: "¡Cerrar!"
		});
		
	}else{
		
		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);
		
		$(datosImagen).on("load", function(event){
			
			var rutaImagen = event.target.result;

			$(".previsualizar").attr("src", rutaImagen);

		})

	}
})

/*=============================================
EDITAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEditarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	
	var datos = new FormData();
    datos.append("idProducto", idProducto);

     $.ajax({

      url:"ajax/productos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
          console.log(respuesta);
          var datosCategoria = new FormData();
          datosCategoria.append("idCategoria",respuesta["id_categoria"]);

           $.ajax({

              url:"ajax/categorias.ajax.php",
              method: "POST",
              data: datosCategoria,
              cache: false,
              contentType: false,
              processData: false,
              dataType:"json",
              success:function(respuesta){
                  
                  $("#editarCategoria").val(respuesta["id"]);
                  $("#editarCategoria").html(respuesta["categoria"]);

              }

          })

           $("#editarCodigo").val(respuesta["codigo"]);

           $("#editarDescripcion").val(respuesta["descripcion"]);

           $("#editarStock").val(respuesta["stock"]);

           $("#editarPrecioCompra").val(respuesta["precio_compra"]);

           $("#editarPrecioVenta").val(respuesta["precio_venta"]);

           if(respuesta["imagen"] != ""){

           	$("#imagenActual").val(respuesta["imagen"]);

           	$(".previsualizar").attr("src",  respuesta["imagen"]);

           }

      }

  })

})

/*=============================================
ELIMINAR PRODUCTO
=============================================*/

$(".tablaProductos tbody").on("click", "button.btnEliminarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var codigo = $(this).attr("codigo");
	var imagen = $(this).attr("imagen");
	
	swal({

		title: '¿Está seguro de borrar el producto?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar producto!'
        }).then(function(result) {
        if (result.value) {

        	window.location = "index.php?ruta=productos&idProducto="+idProducto+"&imagen="+imagen+"&codigo="+codigo;

        }


	})

})
	


/*=============================================
AGREGAR PRODUCTO AL CARRITO
=============================================*/


$("button.btnAgregarCarrito").on("click", function(){
	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
    datos.append("idProductoCarrito", idProducto);
	
	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			swal({
				type: "success",
				title: "El Producto ha sido agregado al carrito correctamente",
				showConfirmButton: true,
				confirmButtonText: "Cerrar"
			}) 
		}
	})
  

})

$("i.btnEliminarCarrito").on("click", function(){
	var idProducto = $(this).attr("idProducto");
	var datos = new FormData();
    datos.append("idProductoEliminarCarrito", idProducto);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			var envio = 9000;
			var subTotal = 0;
			var total = 0;


			for(let i = 0; i < respuesta.length; i++) {
				var item = jQuery.parseJSON(respuesta[i]);
				subTotal = subTotal + (item["precio_venta"] * item["cantidad"]);
			}

			total = envio + subTotal;

			$('#totalCarrito').children().remove();
			$('#totalCarrito').append(`<tr class="border-bottom"><td>Envio</td><td>$ ${envio.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
			$('#totalCarrito').append(`<tr class="border-bottom"><td>Subtotal</td><td>$ ${subTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
			$('#totalCarrito').append(`<tr class="border-bottom"><td>Total</td><td>$ ${total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
			
		}
	})

	// Eliminar Tiempo real
	$(this).parent().parent().remove();
});


$("input.cantidadCarrito").change(CambiarCantidad);
	
	
function CambiarCantidad(){
	var idProducto = $(this).attr("idProducto");
	var elemento = this;
	var valorAnterior = elemento.defaultValue;
	var cantidad = $(this).val();
	var datos = new FormData();
    datos.append("idProductoCantidadCarrito", idProducto);
	datos.append("cantidadCarrito", cantidad);

	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			console.log(respuesta);

			if(respuesta == 'errorCantidad'){
				elemento.value = valorAnterior;
				swal("Cantidad no disponible!");
			}else {
				var envio = 9000;
				var subTotal = 0;
				var total = 0;

				$('.content-shopping-card').children().remove();
				$('.content-shopping-card').append('<div class="row border-bottom shopping-card shopping-card-titulo"><div class="col-md-1"></div><div class="col-md-2"></div><div class="col-md-4">Producto</div><div class="col-md-2">Precio</div><div class="col-md-1">Cantidad</div><div class="col-md-2">Subtotal</div></div>');

				for(let i = 0; i < respuesta.length; i++) {
					var item = jQuery.parseJSON(respuesta[i]);
					console.log(item.precio_venta);
					var totalProducto = item["precio_venta"] * item["cantidad"];
					subTotal = subTotal + totalProducto;

					$('.content-shopping-card').append(`<div class="row border-bottom shopping-card" id="shopping-card-${i}"></div>`);
					$(`#shopping-card-${i}`).append(`<div class="col-md-1 col-sm-1 col-2"><i class="far fa-times-circle btnEliminarCarrito" idProducto="${item["id"]}"></i></div>`);
					$(`#shopping-card-${i}`).append(`<div class="col-md-2 col-sm-2 col-2 imagen-producto-carrito"><div class="img-shoppingcard"><img src="${item["imagen"]}" class="card-img-top" alt="..."></div><div>`);
					$(`#shopping-card-${i}`).append(`<div class="col-md-4 col-sm-4 col-5">${item["descripcion"]}</div>`)
					$(`#shopping-card-${i}`).append(`<div class="col-md-2 col-sm-2 col-5">$ ${item["precio_venta"].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</div>`);
					$(`#shopping-card-${i}`).append('<div class="col-md-1 col-sm-1 col-2 espacio-carrito"></div>');
					$(`#shopping-card-${i}`).append(`<div class="col-md-1 col-sm-1 col-5"><input type="text" class="form-control cantidadCarrito" idProducto="${item["id"]}" value="${item["cantidad"]}" min="0" max="999"></div>`);
					$(`#shopping-card-${i}`).append(`<div class="col-md-2 col-sm-2 col-5">$ ${totalProducto.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</div>`);
					
					$("input.cantidadCarrito").change(CambiarCantidad);

				}

				$('.content-shopping-card').append('<div class="row justify-content-end mt-4"><div class="col-lg-4 col-md-6 col-sm-8 col-12"><div class="card"><h5 class="card-header">Total del Carrito</h5><div class="card-body"><table id="totalCarrito" class="table table-borderless"></table><a href="checkout" class="btn btn-success w-100">Finalizar Compra</a></div></div></div></div>');

				total = envio + subTotal;

				$('#totalCarrito').children().remove();
				$('#totalCarrito').append(`<tr class="border-bottom"><td>Envio</td><td>$ ${envio.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
				$('#totalCarrito').append(`<tr class="border-bottom"><td>Subtotal</td><td>$ ${subTotal.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
				$('#totalCarrito').append(`<tr class="border-bottom"><td>Total</td><td>$ ${total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</td></tr>`);
			}
		}
	});
}


$("button.btnBuscarProductos").click(buscarProductos);
$("#txtBuscarProducto").change(buscarProductos);

function buscarProductos(){
	console.log("hola buscar producto");
	var descripcion = $("#txtBuscarProducto").val();
	var datos = new FormData();
    datos.append("buscarProducto", descripcion);
	
	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType:"json",
		success:function(respuesta){
			$('#listaProducto').children().remove();

			if(respuesta.length > 0){
				for(let i = 0; i < respuesta.length; i++) {
					var item = respuesta[i];
					$('#listaProducto').append(`<div class="col-md-3 col-sm-6 col-12 mb-3"><div class="card"><img src="${item["imagen"]}" class="card-img-top" alt="..."><div class="card-body"><h4>${item["precio_venta"].toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</h4><h5 class="card-title">${item["descripcion"]}</h5></div><div class="card-button justify-content-center"><button class="btn btn-secondary w-100 btnAgregarCarrito" idProducto="${item["id"]}">Agregar Carrito</button></div></div></div>`);
				}
			}else{
				$('#listaProducto').append('<div class="busqueda-vacia"><div><h2>No hay productos que coincidan con tu búsqueda.</h2></div><div><ul><li>Revisa la ortografía de la descripción del producto</li><li>Utiliza palabras más genénericas o menos palabras</li></ul></div></div>')
			}


		}
	});
}
