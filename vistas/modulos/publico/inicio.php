 <div>
    <!-- Carousel -->
    <div id="carouselExampleCaptions" class="carousel slide mb-4" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="vistas/img/banner/banner1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            <h5>Repuestos Mundiales</h5>
            <p>Compre repuestos al mejor precio</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="vistas/img/banner/banner2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tenemos todo en REPUESTOS para tu carro</h5>
                <p>CONTACTANOS</p>
            </div>
        </div>

        <div class="carousel-item">
            <img src="vistas/img/banner/Banner4.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Repuestos y Accesorios Automotrices</h5>
                <p>Proveemos Repuestos y Servicios de Calidad, respondiendo rápidamente a las necesidades de nuestros clientes locales e internacionales.</p>
            </div>
        </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Destacado -->
    
    <div class="container-lg mb-4">
        <div class="row no-gutters mb-4">
            <div class="col-md-8 col-sm-12 col-12">
                <div class="inicio-context row">

                    <div class="col-md-4 col-sm-6">
                        <a href="productos">
                        <div class="menu-button">
                            <div>
                                <i class="fab fa-product-hunt"></i>
                                <p>Productos</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="servicios">

                        <div class="menu-button">
                            <div>
                                <i class="fas fa-tools"></i>
                                <p>Servicios</p>
                            </div>
                        </div>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-6">
                        <a href="nosotros">
                        <div class="menu-button">
                            <div>
                                <i class="fas fa-user-tie"></i>
                                <p>Nosotros</p>
                            </div>
                        </div>
                        </a>
                    </div> 

                    <div class="col-md-4 col-sm-6">
                    <a href="blog">

                        <div class="menu-button">
                            <div>
                                <i class="fas fa-blog"></i>
                                <p>Blog</p>
                            </div>
                        </div>
                        </a>

                    </div>

                    <div class="col-md-4 col-sm-6" col-6>
                        <a href="contactanos">    
                        <div class="menu-button">
                            <div>
                                <i class="far fa-envelope"></i>
                                <p>Contactanos</p>
                            </div>
                        </div>
                        </a>
                    </div>

                                         

                </div>
            </div>

            <div class="col-md-1 col-sm-12 col-12">
            </div>
            <div class="col-md-3 col-sm-12 col-12">
                <video class='inicio-videos' controls="controls">
                    <source src="vistas/videos/marussi.mp4" type="video/mp4">
                    Tu navegador no soporta etiquetas de videos.
                </video>
            </div>
        </div>
    </div>

    <div class="seccion-destacado mb-4">
        <div class="container-lg mb-4">
            <h2 class="mb-4">Productos Destacados </h2>
            <div class="owl-carousel">

                <?php

                    $item = null;
                    $valor = null;
                    $orden = "id";

                    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

                    foreach ($productos as $key => $value) {
                        echo '
                        <div class="card">
                            <img src="'.$value["imagen"].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>$'.number_format($value["precio_venta"], 2, ',', '.').'</h4>
                                <h5 class="card-title">'.$value["descripcion"].'</h5>
                            </div>
                            <div class="card-button justify-content-center">
                            <button class="btn btn-secondary w-100 btnAgregarCarrito" idProducto="'.$value["id"].'">Agregar Carrito</button>
                            </div>
                        </div>';
                    }

                ?>
            </div>
        </div>
    </div>
</div>