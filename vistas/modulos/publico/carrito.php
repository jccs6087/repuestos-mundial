<div class="container-lg content-shopping-card">  
    <div class="row border-bottom shopping-card shopping-card-titulo">            
        <div class="col-md-1"></div>
        <div class="col-md-2"></div>
        <div class="col-md-4">Producto</div>
        <div class="col-md-2">Precio</div>
        <div class="col-md-1">Cantidad</div>
        <div class="col-md-2">Subtotal</div>
    </div>

    <?php
        if(isset($_SESSION["carrito"])){
            $productos = $_SESSION["carrito"];
            
            foreach ($productos as $value) {
                $item = json_decode($value, true);

                // echo $item["cantidad"];

                echo '<div class="row border-bottom shopping-card">
                    <div class="col-md-1 col-sm-1 col-2">
                        <i class="far fa-times-circle btnEliminarCarrito" idProducto="'.$item["id"].'"></i>
                    </div>

                    <div class="col-md-2 col-sm-2 col-2 imagen-producto-carrito">
                        <div class="img-shoppingcard">
                            <img src="'.$item["imagen"].'" class="card-img-top" alt="...">
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4 col-5">'.$item["descripcion"].'</div>

                    <div class="col-md-2 col-sm-2 col-5">$ '.number_format($item["precio_venta"], 2, ',', '.').'</div>

                    <div class="col-md-1 col-sm-1 col-2 espacio-carrito">
                    </div>

                    <div class="col-md-1 col-sm-1 col-5">
                        <input type="text" class="form-control" value="'.$item["cantidad"].'" min="0" max="999">
                    </div>

                    <div class="col-md-2 col-sm-2 col-5">$ '.number_format($item["precio_venta"], 2, ',', '.').'</div>
                 
                </div>';
            }
        }
    ?>

    

    <div class="row justify-content-end mt-4">
        <div class="col-lg-4 col-md-6 col-sm-8 col-12">
            <div class="card">
                <h5 class="card-header">Total del Carrito</h5>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION["carrito"])){
                            $productos = $_SESSION["carrito"];
                            $subTotal = 0;
                            $envio = 9000;

                            foreach ($productos as $value) {
                                $item = json_decode($value, true);
                                $subTotal = $subTotal + intval($item["precio_venta"]);
                            }

                            $total = $subTotal + $envio;

                            echo '<table id="totalCarrito" class="table table-borderless">
                                <tr class="border-bottom">
                                    <td>Envio</td>
                                    <td>$ '.number_format($envio, 2, ',', '.').'</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td>Subtotal</td>
                                    <td>$ '.number_format($subTotal, 2, ',', '.').'</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td>Total</td>
                                    <td>$ '.number_format($total, 2, ',', '.').'</td>
                                </tr>
                            </table>';
                        }
                    ?>
                    <a href="checkout" class="btn btn-success w-100">Finalizar Compra</a>
                </div>
            </div>
        </div>
    </div>

    
</div>