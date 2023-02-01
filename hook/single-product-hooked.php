<?php

// Remove Hooked
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);

// review
remove_action('woocommerce_review_before','woocommerce_review_display_gravatar',10);
remove_action('woocommerce_review_before_comment_meta','woocommerce_review_display_rating',10);
remove_action('woocommerce_review_comment_text','woocommerce_review_display_comment_text',10);

// Add Action
add_action('product_rating_reviews','woocommerce_template_single_rating',10);

add_action('woocommerce_single_product_summary','woo_single_product_meta',35);
function woo_single_product_meta (){
	?>
	<div class="single-product-list">
        <ul>
            <!-- Product Sizes-->
                <li><span>Sizes:</span>
                    <?php
                        $sizes = get_the_terms(get_the_ID(),'product-size');
                        $somthing = array();
                        if ($sizes) {
	                        foreach ($sizes as $size ){
		                        $somthing[] = $size->name;
	                        }
	                        echo implode(' , ',$somthing);
                        }else{ echo 'No Sizes';}
                    ?>
                </li>
                <!-- Product Colors-->
                <li><span>Colors:</span>
                     <?php
                        $colors = get_the_terms(get_the_ID(),'product-color');
                        $product_array = array();
                        if ($colors) {
	                        foreach ($colors as $color){
		                        $product_array[] = $color->name;
	                        }
	                        echo implode(' , ',$product_array);
                        }else {
                            echo 'No Color';
                        }
                    ?>
                </li>
            <!-- Product Category-->
            <li><span>Category:</span>
                <?php
                    $product_cats = get_the_terms(get_the_ID(),'product_cat');
                    foreach ($product_cats as $product_cat) {
                        $car_link = get_term_link($product_cat)
                    ?>
                        <a href="<?php echo $car_link; ?>"><?php echo $product_cat->name?></a>
                  <?php };?>
            </li>
            <!-- Product Tags-->
            <li><span>Tags:</span>
                <?php
                    $product_tags = get_the_terms(get_the_ID(),'product_tag');
                    if ($product_tags) {
	                    foreach ($product_tags as $product_tag) {
		                    $product_tag_link = get_term_link($product_tag);
		                    ?>
                            <a href="<?php echo $product_tag_link ?>"><?php echo $product_tag->name; ?></a>
		                    <?php
                        }
                    }else { echo 'No Tags'; }
                ?>
            </li>
        </ul>
	</div>
	<?php
}

// Tabs
add_filter('woocommerce_product_tabs','new_tabs_function');
function new_tabs_function ($default) {
	$default['sizess'] = array(
		'title' => 'Sizes',
        'priority' =>20,
        'callback' =>'sizes_tab_content'
    );
    function sizes_tab_content () {
    ?>
        <div id="second-tab" role="tabpanel" class="tab-pane">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="upper">Size</th>
                    <th class="upper">Bust (CM)</th>
                    <th class="upper">Waist (CM)</th>
                    <th class="upper">Hips (CM)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>XS</td>
                    <td>78</td>
                    <td>60</td>
                    <td>83</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>80</td>
                    <td>62</td>
                    <td>86</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>88</td>
                    <td>65</td>
                    <td>88</td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php
    }

    return $default;
}

// Remove additional information tab
add_filter( 'woocommerce_product_tabs', 'remove_additional_information_tab', 20 );
function remove_additional_information_tab( $tabs ) {
	unset($tabs['additional_information']);
	return $tabs;
}


// Carts pages Hooked
add_action('woocommerce_before_cart' , 'woo_before_cart_function');
function woo_before_cart_function () {
    ?>
<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri() ?>/assets/images/bg/6.jpg" class="parallax-bg"></div>
    <div class="parallax-overlay">
        <div class="centrize">
            <div class="v-center">
                <div class="container">
                    <div class="title center">
                        <h1 class="upper"><?php the_title() ?><span class="red-dot"></span></h1>
                        <h4>We're happy to see you.</h4>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cart-section">
    <div class="container">
    <?php
}

//Woo cart product name
add_filter('woocommerce_cart_item_name','woo_cart_item_product_title');
function woo_cart_item_product_title ($default) {
	return '<span>'.$default.'</span>';
}

//Woo cart product Price
add_filter('woocommerce_cart_item_price','woo_cart_item_product_price');
function woo_cart_item_product_price ($default) {
	return '<span class="cart-price">'.$default.'</span>';
}


add_action('woocommerce_after_cart','woo_after_cart_function');
function woo_after_cart_function () {
    ?>
            </div>
        </div>
    </section>
    <?php
}

