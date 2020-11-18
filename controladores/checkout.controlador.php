<?php

    require_once "../modelos/clientes.modelo.php";
    require_once "../modelos/productos.modelo.php";
    require_once "../modelos/ventas.modelo.php";

    if (!preg_match('/^[0-9]+$/', $_POST["txtDocumento"])){
        echo "errorDocumento";
    } elseif (!preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["txtNombre"])){
        echo "errorNombre";
    } elseif (!preg_match('/^[()\-0-9 ]+$/', $_POST["txtTelefono"])){
        echo "errorTelefono";
    } elseif (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["txtCorreo"])){
        echo "errorCorreo";
    } elseif (!preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["txtDireccion"])){
        echo"errorDireccion";
    } else {

        $tabla = "clientes";
        $valorDocumento = $_POST["txtDocumento"];
        $traerCliente = ModeloClientes::mdlMostrarClientes($tabla, "documento", $valorDocumento);
        
        if(isset($traerCliente["id"])){
            $id = $traerCliente["id"];
            $valor = 1 + $traerCliente["compras"];

            $comprasCliente = ModeloClientes::mdlActualizarCliente($tabla, "compras", $valor, $id);

            $item1b = "ultima_compra";

            date_default_timezone_set('America/Bogota');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');
            $ultimaCompra = $fecha.' '.$hora;

            $fechaCliente = ModeloClientes::mdlActualizarCliente($tabla, "ultima_compra", $ultimaCompra, $id);
            guardarPedido($id);
        } else {

            $datos = array("nombre"=>$_POST["txtNombre"],
                        "documento"=>$_POST["txtDocumento"],
                        "email"=>$_POST["txtCorreo"],
                        "telefono"=>$_POST["txtTelefono"],
                        "direccion"=>$_POST["txtDireccion"],
                        "tipoDocumento"=>$_POST["ddTipoDocumento"],
                        "fecha_nacimiento"=>$_POST["txtFecha"],
                        "compras"=>1);
        
            $respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

            if($respuesta == "ok"){
                $traerCliente = ModeloClientes::mdlMostrarClientes($tabla, "documento", $valorDocumento);
                guardarPedido($traerCliente["id"]);
            }
        }      
    }  

    function guardarPedido($clienteId){        
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        if(!isset($_SESSION["carrito"])){
            $_SESSION['carrito'] = array();
        }

        $subTotal = 0;
        $envio = 9000;
    
        $productos = $_SESSION["carrito"];
		$listaProductos = array();

                        
        
        foreach ($productos as $prd) {
            $productoCarrito = json_decode($prd, true);
            $totalPrecio = $productoCarrito["cantidad"] * intval($productoCarrito["precio_venta"]);
            $subTotal = $subTotal + intval($totalPrecio);

            $tablaProductos = "productos";

            $item = "id";
            $valor = $productoCarrito["id"];
            $orden = "id";

            $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

            $item1a = "ventas";
            $valor1a = $productoCarrito["cantidad"] + $traerProducto["ventas"];

            ModeloProductos::mdlActualizarProducto($tablaProductos, $item1a, $valor1a, $valor);

            $item1b = "stock";
            $valor1b = $traerProducto["stock"] - $productoCarrito["cantidad"];

            ModeloProductos::mdlActualizarProducto($tablaProductos, $item1b, $valor1b, $valor);
            
            $producto =  array("id"=>$traerProducto["id"],"descripcion"=>$traerProducto["descripcion"],
            "cantidad"=>$productoCarrito["cantidad"],
            "stock"=>$valor1b, 
            "precio"=>$productoCarrito["precio_venta"], 
            "total"=>$totalPrecio);

            array_push($listaProductos,$producto);
        }

        $total = $subTotal + $envio;

        /*=============================================
        GUARDAR PEDIDO
        =============================================*/	

        $tabla = "ventas";

        $datos = array("id_vendedor"=>1,
                        "id_cliente"=>$clienteId,
                        "codigo"=>1001,
                        "productos"=>json_encode($listaProductos, true),
                        "impuesto"=>0,
                        "neto"=>$total,
                        "total"=>$total,
                        "metodo_pago"=>"Efectivo");

        $respuesta = ModeloVentas::mdlIngresarVenta($tabla, $datos);

        if($respuesta == "ok"){
            $_SESSION["carrito"] = [];
        }

        echo $respuesta;
    }  
?>