<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="single-product-price">
    <div class="col-xs-6">
        <div class="row">
            <h3 class="price_class">
                <?php $price_close = str_replace('<ins>','<span>', $product->get_price_html());
                    echo str_replace('</ins>','</span>',$price_close);
                ?>

            </h3>
        </div>
    </div>
    <?php do_action('product_rating_reviews');?>
</div>