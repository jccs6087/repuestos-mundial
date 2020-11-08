<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";

class AjaxProductos{

  /*=============================================
  GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
  =============================================*/
  public $idCategoria;

  public function ajaxCrearCodigoProducto(){

  	$item = "id_categoria";
  	$valor = $this->idCategoria;
    $orden = "id";

  	$respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

  	echo json_encode($respuesta);

  }

  /*=============================================
  EDITAR PRODUCTO
  =============================================*/ 

  public $idProducto;
  public $traerProductos;
  public $nombreProducto;

  public function ajaxEditarProducto(){

    if($this->traerProductos == "ok"){

      $item = null;
      $valor = null;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);


    }else if($this->nombreProducto != ""){

      $item = "descripcion";
      $valor = $this->nombreProducto;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }else{

      $item = "id";
      $valor = $this->idProducto;
      $orden = "id";

      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor,
        $orden);

      echo json_encode($respuesta);

    }

  }

  public function ajaxAgregarCarrito(){

    if(session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if(!isset($_SESSION["carrito"])){
      $_SESSION['carrito'] = array();
    }

    $item = "id";
    $valor = $this->idProducto;
    $orden = "id";
    $array = $_SESSION['carrito'];
    $existe = 0;
    $productoNuevo ="";
    
    // Validar si ya existe el producto
    foreach ($array as $values) {
      $value = json_decode($values, true);

      if($value["id"] == $valor) {
        $existe = 1;
      }
    }

    if ($existe == 0) {
      $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

      $productoNuevo ='{
        "id": "'.$respuesta["id"].'",
        "imagen": "'.$respuesta["imagen"].'",
        "descripcion": "'.$respuesta["descripcion"].'",
        "precio_venta": "'.$respuesta["precio_venta"].'",
        "cantidad": "1"

      }';

      array_push($array, $productoNuevo);
      $_SESSION["carrito"] = $array;

    }

    echo json_encode($productoNuevo);
  }

  public function ajaxEliminarCarrito(){
    if(session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if(!isset($_SESSION["carrito"])){
      $_SESSION['carrito'] = array();
    }

    $array = $_SESSION['carrito'];
    $arrayNuevo = array();
    $valor = $this->idProducto;

    foreach ($array as $values) {
      $value = json_decode($values, true);

      if($value["id"] != $valor) {
        array_push($arrayNuevo, $values);
      }
    } 

    $_SESSION['carrito'] = $arrayNuevo;
    
    echo json_encode($_SESSION['carrito']);
    
  }

}


/*=============================================
GENERAR CÓDIGO A PARTIR DE ID CATEGORIA
=============================================*/	

if(isset($_POST["idCategoria"])){

	$codigoProducto = new AjaxProductos();
	$codigoProducto -> idCategoria = $_POST["idCategoria"];
	$codigoProducto -> ajaxCrearCodigoProducto();

}
/*=============================================
EDITAR PRODUCTO
=============================================*/ 

if(isset($_POST["idProducto"])){

  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProducto"];
  $editarProducto -> ajaxEditarProducto();

}

/*=============================================
AGREGAR PRODUCTO CARRITO
=============================================*/ 

if(isset($_POST["idProductoCarrito"])){
  
  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProductoCarrito"];
  $editarProducto -> ajaxAgregarCarrito();
  
}

if(isset($_POST["idProductoEliminarCarrito"])){
  
  $editarProducto = new AjaxProductos();
  $editarProducto -> idProducto = $_POST["idProductoEliminarCarrito"];
  $editarProducto -> ajaxEliminarCarrito();
  
}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["traerProductos"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> traerProductos = $_POST["traerProductos"];
  $traerProductos -> ajaxEditarProducto();

}

/*=============================================
TRAER PRODUCTO
=============================================*/ 

if(isset($_POST["nombreProducto"])){

  $traerProductos = new AjaxProductos();
  $traerProductos -> nombreProducto = $_POST["nombreProducto"];
  $traerProductos -> ajaxEditarProducto();

}

