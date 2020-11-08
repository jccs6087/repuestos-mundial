<?php
    $link = new PDO("mysql:host=localhost;dbname=sis_inventario",
        "root", "");

    $link->exec("set names utf8");

    $stmt = $link->prepare("SELECT * FROM productos");

    $stmt -> execute();
    $productos = $stmt -> fetchAll();
    
    $html = '<div class="woocommerce columns-4 "><ul class="products columns-4">';
    for($i = 0; $i < count($productos); $i++){
        $html .= '<li class="ast-article-single product type-product post-45 status-publish first instock product_cat-cactus has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
            <div class="astra-shop-thumbnail-wrap">
                <span class="onsale">¡Oferta!</span>
                <a href="http://localhost:8080/juanc/producto/old-lady-cactus/" 
                    class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <img width="300" 
                        height="300" src="http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-300x300.jpg" 
                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" 
                        alt="" 
                        loading="lazy" 
                        srcset="http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-300x300.jpg 300w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-150x150.jpg 150w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-768x768.jpg 768w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-600x600.jpg 600w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-100x100.jpg 100w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img.jpg 1000w" 
                        sizes="(max-width: 300px) 100vw, 300px">
                </a>
            </div>
            <div class="astra-shop-summary-wrap">			
                <span class="ast-woo-product-category">Cactus</span> 
                <a href="http://localhost:8080/juanc/producto/old-lady-cactus/" 
                    class="ast-loop-product__link">
                    <h2 class="woocommerce-loop-product__title">'.$productos[$i]["descripcion"].'</h2>
                </a>
                <span class="price">
                    <del>
                        <span class="woocommerce-Price-amount amount">
                            <bdi>
                                <span class="woocommerce-Price-currencySymbol">$</span>'.$productos[$i]["precio_venta"].'
                            </bdi>
                        </span>
                    </del> 
                </span>
            </div>
        </li>';
            
            
    }

    $html .= '</ul></div>';

    echo $html;
?>


<li class="ast-article-single product type-product post-45 status-publish first instock product_cat-cactus has-post-thumbnail sale featured shipping-taxable purchasable product-type-simple">
	<div class="astra-shop-thumbnail-wrap">
        <span class="onsale">¡Oferta!</span>
        <a href="http://localhost:8080/juanc/producto/old-lady-cactus/" 
            class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
            <img width="300" 
                height="300" src="http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-300x300.jpg" 
                class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" 
                alt="" 
                loading="lazy" 
                srcset="http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-300x300.jpg 300w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-150x150.jpg 150w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-768x768.jpg 768w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-600x600.jpg 600w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img-100x100.jpg 100w, http://localhost:8080/juanc/wp-content/uploads/2019/01/cactus4-free-img.jpg 1000w" 
                sizes="(max-width: 300px) 100vw, 300px">
        </a>
    </div>
    <div class="astra-shop-summary-wrap">			
        <span class="ast-woo-product-category">Cactus</span> 
		<a href="http://localhost:8080/juanc/producto/old-lady-cactus/" 
            class="ast-loop-product__link">
            <h2 class="woocommerce-loop-product__title">Old Lady Cactus</h2>
        </a>
        <div class="star-rating">
            <span style="width:0%">
                Valorado en <strong class="rating">0</strong> de 5
            </span>
        </div>
	    <span class="price">
            <del>
                <span class="woocommerce-Price-amount amount">
                    <bdi>
                        <span class="woocommerce-Price-currencySymbol">£</span>15.00
                    </bdi>
                </span>
            </del> 
        </span>
    </div>
</li>