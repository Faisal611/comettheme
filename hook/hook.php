<?php
//woocommerce title
add_filter( 'woocommerce_show_page_title', 'woocommerce_page_title_function' );
function woocommerce_page_title_function() {
	$shop = get_option( 'woocommerce_shop_page_id' );
	?>
    <section class="page-title parallax">
        <div data-parallax="scroll"
             data-image-src="<?php echo get_template_directory_uri() ?>'/assets/images/bg/19.jpg'"
             class="parallax-bg">
        </div>
        <div class="parallax-overlay">
            <div class="centrize">
                <div class="v-center">
                    <div class="container">
                        <div class="title center">
                            <h1 class="upper"><?php woocommerce_page_title() ?></h1>
                            <h4><?php the_field( 'shop_subtitle', $shop ); ?></h4>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
}

    // Archive Products Page
    add_action( 'woocommerce_before_shop_loop', 'all_shop_page_section_function_start', 10 );
        function all_shop_page_section_function_start() {
            ?>
            <section>
                <div class="container">
                    <div class="shop-menu">
            <?php
        }

    add_action( 'woocommerce_before_shop_loop', 'catalog_ordering_before', 29 );
        function catalog_ordering_before() {
            ?>
            <div class="col-md-4 col-sm-4">
                <div class="row">
                    <div class="form-select">
            <?php
        }
    add_action('woocommerce_before_shop_loop','catalog_ordering_after',31);
    function catalog_ordering_after () {
        ?>
            </div>
            </div>
            </div>
            </div>
        <?php
    }

    add_action( 'woocommerce_after_shop_loop', 'all_shop_page_section_function_ends',10 );
    function all_shop_page_section_function_ends() {
        ?>
            </div>
        </section>
        <?php
    }

    // pagination hidden
    add_action( 'woocommerce_before_shop_loop', 'product_pagination_before', 40 );
    function product_pagination_before() {
        ?>
        <section>
            <div class="all_product_pagination">
        <?php
    }
   add_action('woocommerce_after_shop_loop','product_pagination_after',5);
    function product_pagination_after () {
        ?>
            </div>
        <?php
    }





    // woocommerce Product Hooked / Content Product
    remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
    remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);

    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
    remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);
    remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);



    // Product Image Links
    add_action('woocommerce_before_shop_loop_item','loop_before_link');
    function loop_before_link () {
        ?>
        <div class="product-thumb"><a href="<?php the_permalink();?>"><?php the_post_thumbnail();?></a>
            <div class="product-overlay">
    <?php
	    global $product;

	    echo apply_filters(
		    'woocommerce_loop_add_to_cart_link',
		    // WPCS: XSS ok.
		    sprintf(
			    '<a href="%s" data-quantity="%s" class="%s" %s>%s <i class="ti-bag"></i></a>',
			    esc_url( $product->add_to_cart_url() ),
			    esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			    esc_attr( 'btn btn-color-out btn-sm' ),
			    isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			    esc_html( $product->add_to_cart_text() )
		    ),
		    $product,
		    $args
	    );
    ?>
            </div>
        </div>

    <?php
    }

    add_action('woocommerce_after_shop_loop_item','woo_product_title');
    function woo_product_title () {
    ?>
        <div class="product-info">
            <h4 class="upper"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
            <span><?php global $product; echo $product->get_price_html()?></span>
            <div class="save-product"><a href="#"><i class="icon-heart"></i></a></div>
        </div>
    <?php
    }