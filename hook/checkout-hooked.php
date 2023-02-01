<?php
add_filter('woocommerce_billing_fields', 'khali_korbo');
function khali_korbo ($default) {

	$default['billing_first_name']['label'] ='Full Name';
	$default['billing_first_name']['placeholder'] ='Full Name';
	$default['billing_first_name']['class'] = array('form-group');
	$default['billing_first_name']['input_class'] = array('form-control');

	$default['billing_address_1']['label'] ='Address 1';
	$default['billing_address_1']['placeholder'] ='Address 1';
	$default['billing_address_1']['class'] = array('form-group');
	$default['billing_address_1']['input_class'] = array('form-control');

	$default['billing_address_2']['label'] ='Address 2';
	$default['billing_address_2']['placeholder'] ='Address 2';
	$default['billing_address_2']['class'] = array('form-group');
	$default['billing_address_2']['input_class'] = array('form-control');

	$default['billing_city']['label'] ='City';
	$default['billing_city']['placeholder'] ='City';
	$default['billing_city']['class'] = array('form-group');
	$default['billing_city']['input_class'] = array('form-control');

	$default['billing_state']['label'] ='state';
	$default['billing_state']['placeholder'] ='state';
	$default['billing_state']['class'] = array('form-group');
	$default['billing_state']['input_class'] = array('form-control');

	$default['billing_postcode']['label'] ='ZIP Code';
	$default['billing_postcode']['placeholder'] ='ZIP Code';
	$default['billing_postcode']['class'] = array('form-group');
	$default['billing_postcode']['input_class'] = array('form-control');


	$default['billing_last_name']['type']  = Null;
	$default['billing_company']['type']  = Null;
	$default['billing_email']['type']  = Null;
	$default['billing_phone']['type']  = Null;



	return  $default;

}
add_action('woocommerce_before_checkout_form' , 'woo_before_checkout_form');
function woo_before_checkout_form () {
	?>
	<section>
		<div class="container">
			<div class="checkout-form">
<?php
}

add_action('woocommerce_after_checkout_form' , 'woo_after_checkout_form');
function woo_after_checkout_form () {
	?>
			</div><!----- checkout-form ------>
		</div><!----- container ------>
	</section>
	<?php
}