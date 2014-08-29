<?php
/*
Plugin Name: WooCommerce Kiwipay Payment Gateway
Plugin URI: http://internetbydesign.co.nz
Description: Kiwipay Payment gateway for WooCommerce
Version: 0.1
Author: Internet by Design
Author URI: http://www.internetbydesign.co.nz
*/
add_action('plugins_loaded', 'woocommerce_kiwipay_init', 0);
function woocommerce_kiwipay_init(){
  if(!class_exists('WC_Payment_Gateway')) return;
 
  class WC_Kiwipay extends WC_Payment_Gateway{
    public function __construct(){
	    $this -> id = 'kiwipay';
        $this -> medthod_title = 'Kiwipay';
        $this -> has_fields = false;	
		
		$this -> init_form_fields();
		$this -> init_settings();
		
		add_action('woocommerce_receipt_kiwipay', array(&$this, 'payment_page'));
		add_action('woocommerce_thankyou_kiwipay', array(&$this, 'thankyou_page'));
	}
 
    function woocommerce_add_kiwipay_gateway($methods) {
        $methods[] = 'WC_Kiwipay';
        return $methods;
    }
 
    add_filter('woocommerce_payment_gateways', 'woocommerce_add_kiwipay_gateway' );
	
	function process_payment( $order_id ) {
          global $woocommerce;
        
          $order = &new WC_Order( $order_id );
        
          // Redirect to payment page
          return array(
            'result'    => 'success',
            'redirect'  => add_query_arg('key', $order->order_key, add_query_arg('order', $order_id, get_permalink(woocommerce_get_page_id('pay'))))
          );
          
        
    } 
	
	function payment_page($order_id){
	  $order = &new WC_Order( $order_id );
	  $price = $order->total;
	  $order_number = $order->order_number( );
	  $name = $order->billing_first_name ."%20". $order->billing_last_name;
	  $email = $order->billing_email;
	  $url = "http://kiwipay.harmonyapp.com/iframe/?merchant=complexions&price={$price}&description=Order%20{$order_number}&name={$name}&email={$email}"
	  ?>
	  <iframe src="<?php echo $url; ?>" width="100%" height="700px"  scrolling="yes" frameBorder="0">
		<p>Browser unable to load iFrame</p>
	  </iframe>
	  <?php
	}
	
}
	
