<?php
/**
 * My Account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices(); ?>

<p class="myaccount_user">
	<?php
	printf(
		__( 'Olá <strong>%1$s</strong> (não é %1$s? <a href="%2$s">Sign out</a>).', 'accesspress-store' ) . ' ',
		$current_user->display_name,
		wc_get_endpoint_url( 'customer-logout', '', wc_get_page_permalink( 'myaccount' ) )
	);

	printf( __( 'Do painel de sua conta, você pode ver seus pedidos recentes, gerenciar seu endereço de entrega e <a href="%s">editar sua senha e detalhes de sua conta</a>.', 'accesspress-store' ),
		wc_customer_edit_account_url()
	);
	?>
</p>

<?php do_action( 'woocommerce_before_my_account' ); ?>

<?php wc_get_template( 'myaccount/my-downloads.php' ); ?>

<?php wc_get_template( 'myaccount/my-orders.php', array( 'order_count' => $order_count ) ); ?>

<?php wc_get_template( 'myaccount/my-address.php' ); ?>

<?php do_action( 'woocommerce_after_my_account' ); ?>
