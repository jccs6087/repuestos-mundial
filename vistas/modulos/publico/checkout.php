<div class="container content-checkout">  
    <div class="border-bottom w-100 mb-4">
        <h2>Checkout</h2>
    </div>
    <form>
        <div class="row">
            <div class="col-md-6 col-12">
            
            <div class="form-group row">
                <div class="col">
                    <label for="formGroupExampleInput">Tipo Documento</label>
                    <select class="form-control" id="formSelecttipoDocumento"  placeholder="Tipo Documento">
                        <option>Cedula de Ciudadania</option>
                        <option>Cedula Extranjeria</option>
                        <option>Pasaporte</option>
                    </select>
                </div>

                <div class="col">
                    <label for="formGroupExampleInput">Número Documento</label>
                    <input type="text" class="form-control" placeholder="Número Documento">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="formGroupExampleInput">Nombre y Apellido</label>
                    <input type="text" class="form-control" placeholder="Nombre y Apellido">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="formGroupExampleInput">Telfono</label>
                    <input type="text" class="form-control" placeholder="Telefono">
                </div>
                <div class="col">
                    <label for="formGroupExampleInput">Fecha Nacimiento</label>
                    <input type="date" class="form-control" placeholder="Fecha Nacimiento">
                </div>
               
            </div>

            <div class="form-group row">
                
                <div class="col">
                    <label for="formGroupExampleInput">Correo</label>
                    <input type="text" class="form-control" placeholder="Correo">
                </div>
            </div>

            <div class="form-group row">
                <div class="col">
                    <label for="formGroupExampleInput">Direccion</label>
                    <input type="text" class="form-control" placeholder="Direccion">
                </div>
            </div>

            </div>

            <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tu Pedido</h5>
                    <table class="table table-borderless">
                        <tr class="border-bottom">
                            <td>Producto</td>
                            <td>Subtotal</td>
                        </tr>

                        <?php
                            if(isset($_SESSION["carrito"])){
                                $productos = $_SESSION["carrito"];
                                $subTotal = 0;
                                $envio = 9000;
                                
                                foreach ($productos as $value) {
                                    $item = json_decode($value, true);
                                    $subTotal = $subTotal + intval($item["precio_venta"]);

                                    echo '<tr class="border-bottom">
                                        <td>'.$item["descripcion"].'x'.$item["cantidad"].'</td>
                                        <td>$ '.number_format($item["precio_venta"], 2, ',', '.').'</td>
                                    </tr>';
                                }
                            }

                            $total = $subTotal + $envio;

                            echo '
                                <tr class="border-bottom totales">
                                    <td>Subtotal</td>
                                    <td>$ '.number_format($subTotal, 2, ',', '.').'</td>
                                </tr>
                                <tr class="border-bottom totales">
                                    <td>Envio</td>
                                    <td>$ '.number_format($envio, 2, ',', '.').'</td>
                                </tr>
                                
                                <tr class="border-bottom totales">
                                    <td>Total</td>
                                    <td>$ '.number_format($total, 2, ',', '.').'</td>
                                </tr>'
                        ?>
                    </table>
                    <div>
                        <p>
                            Tus datos personales se utilizarán para procesar tu pedido, mejorar 
                            tu experiencia en esta web y otros propositos descripto en nuestra 
                            <a href="vistas/documentos/POLÍTICA DE PRIVACIDAD.pdf" target="_blank">politica de privacidad.</a>
                        </p>
                    </div>

                    <button class="btn btn-success w-100 btnAgregarPedido">Realizar pedido</button>
                </div>
            </div>          
            </div>
        </div>
    </form>
</div>
