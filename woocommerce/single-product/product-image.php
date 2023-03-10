<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$post_thumbnail_id = $product->get_image_id();
$galleryIds        = $product->get_gallery_image_ids();
?>
<div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-inside control-nav-dark">
    <figure class="woocommerce-product-gallery__wrapper">
        <ul class="slides">
			<?php
			if ( $post_thumbnail_id ) {
				?>
                <li>
                    <img src="<?php echo wp_get_attachment_url( $post_thumbnail_id ); ?>" alt="<?php echo get_post_meta($post_thumbnail_id, '_wp_attachment_image_alt', TRUE); ?>">
                </li>
				<?php
			}
			?>
			<?php
			if ( $galleryIds ) {
				foreach ( $galleryIds as $gallery_id ) {
					?>
                    <li>
                        <img src="<?php echo wp_get_attachment_url( $gallery_id ); ?>" alt="<?php echo get_post_meta($gallery_id, '_wp_attachment_image_alt', TRUE); ?>">
                    </li>
					<?php
				}
			}
			?>
        </ul>
    </figure>
</div>
