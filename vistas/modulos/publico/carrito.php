<div class="container-lg content-shopping-card">  
  

    <?php
        if(isset($_SESSION["carrito"])){
            $productos = $_SESSION["carrito"];
            $i = 0;

            if (count($productos) > 0) {
                echo '  <div class="row border-bottom shopping-card shopping-card-titulo">            
                    <div class="col-md-1"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-4">Producto</div>
                    <div class="col-md-2">Precio</div>
                    <div class="col-md-1">Cantidad</div>
                    <div class="col-md-2">Subtotal</div>
                </div>';
                                
                foreach ($productos as $value) {
                    $item = json_decode($value, true);
                    $totalProducto = $item["precio_venta"] * $item["cantidad"];


                    echo '<div class="row border-bottom shopping-card" id="shopping-card-'.$i.'">
                        <div class="col-md-1 col-sm-1 col-2">
                            <i class="far fa-times-circle btnEliminarCarrito" idProducto="'.$item["id"].'"></i>
                        </div>

                        <div class="col-md-2 col-sm-2 col-2 imagen-producto-carrito">
                            <div class="img-shoppingcard">
                                <img src="'.$item["imagen"].'" class="card-img-top" alt="...">
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-4 col-5">'.$item["descripcion"].'</div>

                        <div class="col-md-2 col-sm-2 col-5">$ '.number_format($item["precio_venta"], 0, ',', '.').'</div>

                        <div class="col-md-1 col-sm-1 col-2 espacio-carrito">
                        </div>

                        <div class="col-md-1 col-sm-1 col-5">
                            <input type="text" class="form-control cantidadCarrito" idProducto="'.$item["id"].'" value="'.$item["cantidad"].'" min="0" max="999">
                        </div>

                        <div class="col-md-2 col-sm-2 col-5">$ '.number_format($totalProducto, 0, ',', '.').'</div>
                        
                    </div>';

                    $i = $i +1;
                }
            } else {
                echo '<div class="busqueda-vacia">
                        <div>
                            <h2>No se han agregado productos en el carrito.</h2>
                        </div>
                        <div><a href="productos" class="btn btn-success w-100">Ir a Productos</a></div>
                    </div>';
            }
        }else{
            echo '<div class="busqueda-vacia">
                <div>
                    <h2>No se han agregado productos en el carrito.</h2>
                </div>
                <div><a href="productos" class="btn btn-success w-100">Ir a Productos</a></div>
            </div>';
        }
    ?>


    <?php
        if(isset($_SESSION["carrito"])){
            $productos = $_SESSION["carrito"];
            $subTotal = 0;
            $envio = 9000;

            if (count($productos) > 0) {
                
                foreach ($productos as $value) {
                    $item = json_decode($value, true);
                    $subTotal = $subTotal + (intval($item["precio_venta"]) * intval($item["cantidad"]));
                }

                $total = $subTotal + $envio;

                echo '
                
                <div class="row justify-content-end mt-4">
                    <div class="col-lg-4 col-md-6 col-sm-8 col-12">
                        <div class="card">
                            <h5 class="card-header">Total del Carrito</h5>
                            <div class="card-body">
                                <table id="totalCarrito" class="table table-borderless">
                                    <tr class="border-bottom">
                                        <td>Envio</td>
                                        <td>$ '.number_format($envio, 0, ',', '.').'</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Subtotal</td>
                                        <td>$ '.number_format($subTotal, 0, ',', '.').'</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <td>Total</td>
                                        <td>$ '.number_format($total, 0, ',', '.').'</td>
                                    </tr>
                                </table>
                                <a href="checkout" class="btn btn-success w-100">Finalizar Compra</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }
    ?>

</div>
    