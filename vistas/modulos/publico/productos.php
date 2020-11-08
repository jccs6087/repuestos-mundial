<div class="container-lg list-product">
    <div class="row justify-content-center">
        <div class="input-group col-md-8 col-sm-6 col-12 mb-3">
            <input type="text" class="form-control" placeholder="Ingrese nombre del producto" aria-label="Ingrese nombre del producto" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <?php

            $item = null;
            $valor = null;
            $orden = "id";

            $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

            foreach ($productos as $key => $value) {
                echo '
                <div class="col-md-3 col-sm-6 col-12 mb-3">
                    <div class="card">
                        <img src="'.$value["imagen"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4>$'.number_format($value["precio_venta"], 0, ',', '.').'</h4>
                            <h5 class="card-title">'.$value["descripcion"].'</h5>
                        </div>
                        <div class="card-button justify-content-center">
                            <button class="btn btn-secondary w-100 btnAgregarCarrito" idProducto="'.$value["id"].'">Agregar Carrito</button>
                        </div>
                    </div>
                </div>';
            }
        ?>
    </div>
</div>