<?php
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
/*
Plugin Name: WooCommerce Kiwipay Payment Gateway
Plugin URI: http://internetbydesign.co.nz
Description: Kiwipay Payment gateway for WooCommerce
Version: 0.1
Author: Internet by Design
Author URI: http://www.internetbydesign.co.nz
*/

function fullCountry($in){
	$out = "";
	$long = array('Afghanistan' , 'Åland Islands' , 'Albania' , 'Algeria' , 'American Samoa' , 'Andorra' , 'Angola' , 'Anguilla' , 'Antarctica' , 'Antigua and Barbuda' , 'Argentina' , 'Armenia' , 'Aruba' , 'Australia' , 'Austria' , 'Azerbaijan' , 'Bahamas' , 'Bahrain' , 'Bangladesh' , 'Barbados' , 'Belarus' , 'Belgium' , 'Belize' , 'Benin' , 'Bermuda' , 'Bhutan' , 'Bolivia - Plurinational State of' , 'Bonaire - Sint Eustatius and Saba' , 'Bosnia and Herzegovina' , 'Botswana' , 'Bouvet Island' , 'Brazil' , 'British Indian Ocean Territory' , 'Brunei Darussalam' , 'Bulgaria' , 'Burkina Faso' , 'Burundi' , 'Cambodia' , 'Cameroon' , 'Canada' , 'Cape Verde' , 'Cayman Islands' , 'Central African Republic' , 'Chad' , 'Chile' , 'China' , 'Christmas Island' , 'Cocos (Keeling) Islands' , 'Colombia' , 'Comoros' , 'Congo' , 'Congo - the Democratic Republic of the' , 'Cook Islands' , 'Costa Rica' , 'Côte d\'Ivoire' , 'Croatia' , 'Cuba' , 'Curaçao' , 'Cyprus' , 'Czech Republic' , 'Denmark' , 'Djibouti' , 'Dominica' , 'Dominican Republic' , 'Ecuador' , 'Egypt' , 'El Salvador' , 'Equatorial Guinea' , 'Eritrea' , 'Estonia' , 'Ethiopia' , 'Falkland Islands (Malvinas)' , 'Faroe Islands' , 'Fiji' , 'Finland' , 'France' , 'French Guiana' , 'French Polynesia' , 'French Southern Territories' , 'Gabon' , 'Gambia' , 'Georgia' , 'Germany' , 'Ghana' , 'Gibraltar' , 'Greece' , 'Greenland' , 'Grenada' , 'Guadeloupe' , 'Guam' , 'Guatemala' , 'Guernsey' , 'Guinea' , 'Guinea-Bissau' , 'Guyana' , 'Haiti' , 'Heard Island and McDonald Islands' , 'Holy See (Vatican City State)' , 'Honduras' , 'Hong Kong' , 'Hungary' , 'Iceland' , 'India' , 'Indonesia' , 'Iran - Islamic Republic of' , 'Iraq' , 'Ireland' , 'Isle of Man' , 'Israel' , 'Italy' , 'Jamaica' , 'Japan' , 'Jersey' , 'Jordan' , 'Kazakhstan' , 'Kenya' , 'Kiribati' , 'Korea - Democratic People\'s Republic of' , 'Korea - Republic of' , 'Kuwait' , 'Kyrgyzstan' , 'Lao People\'s Democratic Republic' , 'Latvia' , 'Lebanon' , 'Lesotho' , 'Liberia' , 'Libya' , 'Liechtenstein' , 'Lithuania' , 'Luxembourg' , 'Macao' , 'Macedonia - the former Yugoslav Republic of' , 'Madagascar' , 'Malawi' , 'Malaysia' , 'Maldives' , 'Mali' , 'Malta' , 'Marshall Islands' , 'Martinique' , 'Mauritania' , 'Mauritius' , 'Mayotte' , 'Mexico' , 'Micronesia - Federated States of' , 'Moldova - Republic of' , 'Monaco' , 'Mongolia' , 'Montenegro' , 'Montserrat' , 'Morocco' , 'Mozambique' , 'Myanmar' , 'Namibia' , 'Nauru' , 'Nepal' , 'Netherlands' , 'New Caledonia' , 'New Zealand' , 'Nicaragua' , 'Niger' , 'Nigeria' , 'Niue' , 'Norfolk Island' , 'Northern Mariana Islands' , 'Norway' , 'Oman' , 'Pakistan' , 'Palau' , 'Palestinian Territory - Occupied' , 'Panama' , 'Papua New Guinea' , 'Paraguay' , 'Peru' , 'Philippines' , 'Pitcairn' , 'Poland' , 'Portugal' , 'Puerto Rico' , 'Qatar' , 'Réunion' , 'Romania' , 'Russian Federation' , 'Rwanda' , 'Saint Barthélemy' , 'Saint Helena - Ascension and Tristan da Cunha' , 'Saint Kitts and Nevis' , 'Saint Lucia' , 'Saint Martin (French part)' , 'Saint Pierre and Miquelon' , 'Saint Vincent and the Grenadines' , 'Samoa' , 'San Marino' , 'Sao Tome and Principe' , 'Saudi Arabia' , 'Senegal' , 'Serbia' , 'Seychelles' , 'Sierra Leone' , 'Singapore' , 'Sint Maarten (Dutch part)' , 'Slovakia' , 'Slovenia' , 'Solomon Islands' , 'Somalia' , 'South Africa' , 'South Georgia and the South Sandwich Islands' , 'South Sudan' , 'Spain' , 'Sri Lanka' , 'Sudan' , 'Suriname' , 'Svalbard and Jan Mayen' , 'Swaziland' , 'Sweden' , 'Switzerland' , 'Syrian Arab Republic' , 'Taiwan - Province of China' , 'Tajikistan' , 'Tanzania - United Republic of' , 'Thailand' , 'Timor-Leste' , 'Togo' , 'Tokelau' , 'Tonga' , 'Trinidad and Tobago' , 'Tunisia' , 'Turkey' , 'Turkmenistan' , 'Turks and Caicos Islands' , 'Tuvalu' , 'Uganda' , 'Ukraine' , 'United Arab Emirates' , 'United Kingdom' , 'United States' , 'United States Minor Outlying Islands' , 'Uruguay' , 'Uzbekistan' , 'Vanuatu' , 'Venezuela - Bolivarian Republic of' , 'Viet Nam' , 'Virgin Islands - British' , 'Virgin Islands - U.S.' , 'Wallis and Futuna' , 'Western Sahara' , 'Yemen' , 'Zambia' , 'Zimbabwe');
	$short = array('AF','AX','AL','DZ','AS','AD','AO','AI','AQ','AG','AR','AM','AW','AU','AT','AZ','BS','BH','BD','BB','BY','BE','BZ','BJ','BM','BT','BO','BQ','BA','BW','BV','BR','IO','BN','BG','BF','BI','KH','CM','CA','CV','KY','CF','TD','CL','CN','CX','CC','CO','KM','CG','CD','CK','CR','CI','HR','CU','CW','CY','CZ','DK','DJ','DM','DO','EC','EG','SV','GQ','ER','EE','ET','FK','FO','FJ','FI','FR','GF','PF','TF','GA','GM','GE','DE','GH','GI','GR','GL','GD','GP','GU','GT','GG','GN','GW','GY','HT','HM','VA','HN','HK','HU','IS','IN','ID','IR','IQ','IE','IM','IL','IT','JM','JP','JE','JO','KZ','KE','KI','KP','KR','KW','KG','LA','LV','LB','LS','LR','LY','LI','LT','LU','MO','MK','MG','MW','MY','MV','ML','MT','MH','MQ','MR','MU','YT','MX','FM','MD','MC','MN','ME','MS','MA','MZ','MM','NA','NR','NP','NL','NC','NZ','NI','NE','NG','NU','NF','MP','NO','OM','PK','PW','PS','PA','PG','PY','PE','PH','PN','PL','PT','PR','QA','RE','RO','RU','RW','BL','SH','KN','LC','MF','PM','VC','WS','SM','ST','SA','SN','RS','SC','SL','SG','SX','SK','SI','SB','SO','ZA','GS','SS','ES','LK','SD','SR','SJ','SZ','SE','CH','SY','TW','TJ','TZ','TH','TL','TG','TK','TO','TT','TN','TR','TM','TC','TV','UG','UA','AE','GB','US','UM','UY','UZ','VU','VE','VN','VG','VI','WF','EH','YE','ZM','ZW');
	return(str_replace($short, $long, $in));
}

add_action('plugins_loaded', 'woocommerce_kiwipay_init', 0);
function woocommerce_kiwipay_init(){
  if(!class_exists('WC_Payment_Gateway')) return;
 
	class WC_Kiwipay extends WC_Payment_Gateway{
		public function __construct(){
			$this -> id = 'kiwipay';
			$this -> medthod_title = 'Kiwipay';
			$this -> method_description = 'Kiwipay';
			$this -> has_fields = false;
			
			$this -> title = $this -> settings['title'];
			$this -> description = $this -> settings['description'];
			$this -> merchant_id = $this -> settings['merchant_id'];
			
			$this -> init_form_fields();
			$this -> init_settings();
			
			if ( version_compare( WOOCOMMERCE_VERSION, '2.0.0', '>=' ) ) {
				add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( &$this, 'process_admin_options' ) );
			} else {
				add_action( 'woocommerce_update_options_payment_gateways', array( &$this, 'process_admin_options' ) );
			}
			
			add_action('woocommerce_receipt_kiwipay', array(&$this, 'payment_page'));
			add_action('woocommerce_thankyou_kiwipay', array(&$this, 'thankyou_page'));
		}
	
		function init_form_fields(){
	 
		   $this -> form_fields = array(
					'enabled' => array(
						'title' => __('Enable/Disable'),
						'type' => 'checkbox',
						'label' => __('Enable Kiwipay Payment Module.'),
						'default' => 'no'),
					'title' => array(
						'title' => __('Title:'),
						'type'=> 'text',
						'description' => __('This controls the title which the user sees during checkout.'),
						'default' => __('Credit Card')),
					'description' => array(
						'title' => __('Description:'),
						'type' => 'textarea',
						'description' => __('This controls the description which the user sees during checkout.'),
						'default' => __('Pay securely by Credit or Debit card via Kiwipay.')),
					'username' => array(
						'title' => __('username'),
						'type' => 'text',
						'description' => __('This is the username provided by Kiwipay"')),
					);
		}
	
		public function admin_options(){
			echo '<h3>'.__('Kiwipay Payment Gateway').'</h3>';
			echo '<p>'.__('Kiwipay is a New Zealand based credit card processor').'</p>';
			echo '<table class="form-table">';
			// Generate the HTML For the settings form.
			$this -> generate_settings_html();
			echo '</table>';
	 
		}

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
		  $username = $this -> username;
		  $price = $order -> get_total( );
		  $order_number = urlencode( $order -> get_order_number( ) );
		  $name = urlencode( $order -> billing_first_name ." ". $order -> billing_last_name );
		  $email = $order -> billing_email;
		  $address1 = $order -> billing_address_1;
		  $city = $order -> billing_city;
		  $state = $order -> billing_state;
		  $zip = $order -> billing_postcode;
		  $country = fullCountry( $order -> billing_country );
		  $return_url = $this->get_return_url( $order );
		  $url = "http://kiwipay.harmonyapp.com/iframe/?merchant={$username}&name={$name}&email={$email}&price={$price}&description=Order%20{$order_number}&address1={$address1}&city={$city}&state={$state}&zip={$zip}&country={$country}&return_url={$return_url}";
		  ?>
		  <iframe src="<?php echo $url; ?>" width="100%" height="700px"  scrolling="yes" frameBorder="0">
			<p>Browser unable to load iFrame</p>
		  </iframe>
		  <?php
		}
		
		function thankyou_page($order_id) {
          global $woocommerce;
          
			$order = new WC_Order( $order_id );

			// Mark as on-hold (we have to check we have recieved the payment manually)
			$order->update_status('on-hold', __( 'Manual payment confirmation required', 'woocommerce' ));

			// Reduce stock levels
			$order->reduce_order_stock();

			// Remove cart
			$woocommerce->cart->empty_cart();
                  
        }
	}

	function woocommerce_add_kiwipay_gateway($methods) {
		$methods[] = 'WC_Kiwipay';
		return $methods;
	}
	
	add_filter('woocommerce_payment_gateways', 'woocommerce_add_kiwipay_gateway' );
	
}