<?php
function dtpa_pa_tracking( $order_id ) {
global $dtpa_options;
if($dtpa_options['enable'] == true) {
$order = new WC_Order( $order_id );

$total = $order->get_order_total() - $order->get_shipping();
$ordernr = $order->get_order_number();

$programid = $dtpa_options['programid'];

echo '<img src="http://www.partner-ads.com/dk/leadtrack.php?programid='.$programid.'&amp;type=salg&amp;ordrenummer='.substr($ordernr, 1).'&amp;varenummer=x&amp;antal=1&amp;omprsalg='.$total.'" alt="" width="1" height="1" />';
 }
}
add_action( 'woocommerce_thankyou', 'dtpa_pa_tracking' );

?>