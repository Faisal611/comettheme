<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count = $product->get_rating_count();
$review_count = $product->get_review_count();
$average      = $product->get_average_rating();
$average      = ceil($average);

?>

<div class="col-xs-6 text-right">
    <div class="row">
        <span class="rating-stars">
            <?php
            $count = 1;
            while ( $count <= $average ) :?>
                <i class="ti-star full"></i>
	            <?php $count ++; endwhile; ?>

	        <?php
                if ( $average < 5 ) :
		        $bakithake = 5-$average;
		        $count = 1;
		        while ( $count <= $bakithake ):
            ?>
                <i class="ti-star"></i>
            <?php $count++; endwhile; endif; ?>
            <span class="hidden-xs">(<?php echo $review_count ?> Reviews)</span>
        </span>

    </div>
</div>