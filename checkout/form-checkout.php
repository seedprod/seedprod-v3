<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

global $woocommerce; $woocommerce_checkout = $woocommerce->checkout();
?>

<?php $woocommerce->show_messages(); ?>

<?php 

// If checkout registration is disabled and not logged in, the user cannot checkout
if (get_option('woocommerce_enable_signup_and_login_from_checkout')=="no" && get_option('woocommerce_enable_guest_checkout')=="no" && !is_user_logged_in()) :
	echo apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'));
	return;
endif;

?>
	<h3 id="order_review_heading"><?php _e('Your order', 'woocommerce'); ?></h3>
	<table class="shop_table">
		<thead>
			<tr>
				<th class="product-name"><?php _e('Product', 'woocommerce'); ?></th>
<!-- 				<th class="product-quantity"><?php _e('Qty', 'woocommerce'); ?></th> -->
				<th class="product-total"><?php _e('Totals', 'woocommerce'); ?></th>
			</tr>
		</thead>
		<tfoot>

			<tr class="cart-subtotal">
				<th colspan="1"><strong><?php _e('Cart Subtotal', 'woocommerce'); ?></strong></th>
				<td><?php echo $woocommerce->cart->get_cart_subtotal(); ?></td>
			</tr>

			<?php if ($woocommerce->cart->get_discounts_before_tax()) : ?>

			<tr class="discount">
				<th colspan="1"><?php _e('Cart Discount', 'woocommerce'); ?></th>
				<td>-<?php echo $woocommerce->cart->get_discounts_before_tax(); ?></td>
			</tr>

			<?php endif; ?>

			<?php if ( $woocommerce->cart->needs_shipping() && $woocommerce->cart->show_shipping() ) : ?>

			<?php do_action('woocommerce_review_order_before_shipping'); ?>

			<tr class="shipping">
				<th colspan="2"><?php _e('Shipping', 'woocommerce'); ?></th>
				<td>
				<?php
					// If at least one shipping method is available
					if ( $available_methods ) {

						// Prepare text labels with price for each shipping method
						foreach ( $available_methods as $method ) {
							$method->full_label = esc_html( $method->label );

							if ( $method->cost > 0 ) {
								$method->full_label .= ': ';

								// Append price to label using the correct tax settings
								if ( $woocommerce->cart->display_totals_ex_tax || ! $woocommerce->cart->prices_include_tax ) {
									$method->full_label .= woocommerce_price( $method->cost );
									if ( $method->get_shipping_tax() > 0 && $woocommerce->cart->prices_include_tax ) {
										$method->full_label .= ' '.$woocommerce->countries->ex_tax_or_vat();
									}
								} else {
									$method->full_label .= woocommerce_price( $method->cost + $method->get_shipping_tax() );
									if ( $method->get_shipping_tax() > 0 && ! $woocommerce->cart->prices_include_tax ) {
										$method->full_label .= ' '.$woocommerce->countries->inc_tax_or_vat();
									}
								}
							}
						}

						// Print a single available shipping method as plain text
						if ( 1 === count( $available_methods ) ) {

							echo $method->full_label;
							echo '<input type="hidden" name="shipping_method" id="shipping_method" value="'.esc_attr( $method->id ).'">';

						// Show multiple shipping methods
						} else {

							if ( get_option('woocommerce_shipping_method_format') == 'select' ) {

								echo '<select name="shipping_method" id="shipping_method">';

								foreach ( $available_methods as $method )
									echo '<option value="' . esc_attr( $method->id ) . '" ' . selected( $method->id, $_SESSION['_chosen_shipping_method'], false ) . '>' . strip_tags( $method->full_label ) . '</option>';

								echo '</select>';

							} else {


								echo '<ul id="shipping_method">';

								foreach ( $available_methods as $method )
									echo '<li><input type="radio" name="shipping_method" id="shipping_method_' . sanitize_title( $method->id ) . '" value="' . esc_attr( $method->id ) . '" ' . checked( $method->id, $_SESSION['_chosen_shipping_method'], false) . ' /> <label for="shipping_method_' . sanitize_title( $method->id ) . '">' . $method->full_label . '</label></li>';

								echo '</ul>';

							}

						}

					// No shipping methods are available
					} else {

						if ( ! $woocommerce->customer->get_shipping_country() || ! $woocommerce->customer->get_shipping_state() || ! $woocommerce->customer->get_shipping_postcode() ) {
							echo '<p>'.__('Please fill in your details above to see available shipping methods.', 'woocommerce').'</p>';
						} else {
							echo '<p>'.__('Sorry, it seems that there are no available shipping methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce').'</p>';
						}

					}
				?></td>

			</tr>

			<?php do_action('woocommerce_review_order_after_shipping'); ?>

			<?php endif; ?>

			<?php
				if ($woocommerce->cart->get_cart_tax()) :

					$taxes = $woocommerce->cart->get_formatted_taxes();

					if (sizeof($taxes)>0) :

						$has_compound_tax = false;

						foreach ($taxes as $key => $tax) : if ($woocommerce->cart->tax->is_compound( $key )) : $has_compound_tax = true; continue; endif;

							?>
							<tr class="tax-rate tax-rate-<?php echo $key; ?>">
								<th colspan="2"><?php
									if ( get_option('woocommerce_prices_include_tax') == 'yes' )
										_e('incl.&nbsp;', 'woocommerce');
									echo $woocommerce->cart->tax->get_rate_label( $key );
								?></th>
								<td><?php echo $tax; ?></td>
							</tr>
							<?php

						endforeach;

						if ($has_compound_tax && !$woocommerce->cart->prices_include_tax) :
							?>
							<tr class="order-subtotal">
								<th colspan="1"><strong><?php _e('Order Subtotal', 'woocommerce'); ?></strong></th>
								<td><?php echo $woocommerce->cart->get_cart_subtotal( true ); ?></td>
							</tr>
							<?php
						endif;

						foreach ($taxes as $key => $tax) : if (!$woocommerce->cart->tax->is_compound( $key )) continue;

							?>
							<tr class="tax-rate tax-rate-<?php echo $key; ?>">
								<th colspan="2"><?php
									if ( get_option('woocommerce_prices_include_tax') == 'yes' )
										_e('incl.&nbsp;', 'woocommerce');
									echo $woocommerce->cart->tax->get_rate_label( $key );
								?></th>
								<td><?php echo $tax; ?></td>
							</tr>
							<?php

						endforeach;

					else :

						?>
						<tr class="tax">
							<th colspan="2"><?php echo $woocommerce->countries->tax_or_vat(); ?></th>
							<td><?php echo $woocommerce->cart->get_cart_tax(); ?></td>
						</tr>
						<?php

					endif;
				elseif ( get_option( 'woocommerce_display_cart_taxes_if_zero' ) == 'yes' ) :
				?>

					<tr class="tax">
						<th colspan="2"><?php echo $woocommerce->countries->tax_or_vat(); ?></th>
						<td><?php _ex( 'N/A', 'Relating to tax', 'woocommerce' ); ?></td>
					</tr>

				<?php
				endif;
			?>

			<?php if ($woocommerce->cart->get_discounts_after_tax()) : ?>

			<tr class="discount">
				<th colspan="1"><?php _e('Order Discount', 'woocommerce'); ?></th>
				<td>-<?php echo $woocommerce->cart->get_discounts_after_tax(); ?></td>
			</tr>

			<?php endif; ?>

			<?php do_action('woocommerce_before_order_total'); ?>

			<tr class="total">
				<th colspan="1"><strong><?php _e('Order Total', 'woocommerce'); ?></strong></th>
				<td><strong><?php echo $woocommerce->cart->get_total(); ?></strong></td>
			</tr>

			<?php do_action('woocommerce_after_order_total'); ?>

		</tfoot>
		<tbody>
			<?php
				if (sizeof($woocommerce->cart->get_cart())>0) :
					foreach ($woocommerce->cart->get_cart() as $item_id => $values) :
						$_product = $values['data'];
						if ($_product->exists() && $values['quantity']>0) :
							echo '
								<tr class = "' . esc_attr( apply_filters('woocommerce_checkout_table_item_class', 'checkout_table_item', $values, $item_id ) ) . '">
									<td class="product-name">'.$_product->get_title().$woocommerce->cart->get_item_data( $values ).'</td>
									<!--<td class="product-quantity">'.$values['quantity'].'</td>-->
									<td class="product-total">' . apply_filters( 'woocommerce_checkout_item_subtotal', $woocommerce->cart->get_product_subtotal( $_product, $values['quantity'] ), $values, $item_id ) . '</td>
								</tr>';
						endif;
					endforeach;
				endif;

				do_action( 'woocommerce_cart_contents_review_order' );
			?>
		</tbody>
	</table>
<?php
do_action('woocommerce_before_checkout_form');
	// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', $woocommerce->cart->get_checkout_url() ); ?>
<p>or</p>
<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>">

	<?php if ( sizeof( $woocommerce_checkout->checkout_fields ) > 0 ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details'); ?>

		<div class="col2-set" id="customer_details">

			<div class="col-1">

				<?php do_action('woocommerce_checkout_billing'); ?>

			</div>

			<div class="col-2">

				<?php do_action('woocommerce_checkout_shipping'); ?>

			</div>

		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details'); ?>

		<h3 id="order_review_heading"><?php _e('Payment', 'woocommerce'); ?></h3>

	<?php endif; ?>

	<?php do_action('woocommerce_checkout_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form'); ?>