<?php
/**
 * 
 * @package WordPress
 * @subpackage One Click Demo Import
 * @subpackage onair2
 * @version 1.0.0
 * Settings for the demo import
 * https://wordpress.org/plugins/one-click-demo-import/
 * 
*/

add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );



function onair2_ocdi_change_time_of_single_ajax_call() {
	return 230;
}
add_action( 'pt-ocdi/time_for_one_ajax_call', 'onair2_ocdi_change_time_of_single_ajax_call' );



/**
 * Disable thumbnail generation during import or it takes ages
 */
add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

/**
 * Customize the popup width
 */
function onair2_ocdi_confirmation_dialog_options ( $options ) {
    return array_merge( $options, array(
        'width'       => 400,
        'dialogClass' => 'wp-dialog',
        'resizable'   => false,
        'height'      => 'auto',
        'modal'       => true,
    ) );
}
add_filter( 'pt-ocdi/confirmation_dialog_options', 'onair2_ocdi_confirmation_dialog_options', 10, 1 );



/**
 * Customize the popup width
 */
if(!function_exists('onair2_ocdi_plugin_intro_text')){
	add_filter( 'pt-ocdi/plugin_intro_text', 'onair2_ocdi_plugin_intro_text' );
	function onair2_ocdi_plugin_intro_text( $default_text ) {
		ob_start();
		$surl = get_site_url();
		$parsehost = parse_url($surl);
	 	$sitehost = $parsehost['host']; 
	 	$qtt_iid = qtt_iid();
			$actk  = get_option( 'qtt_ack_'.trim( $qtt_iid ) );
	 	if(!$actk  || false == $actk  || null == $actk ){
	 		?>
	 		<h2><?php esc_html_e( 'License Activation Error', 'onair2' ); ?></h2>
			<p><strong><?php esc_html_e( 'Please activate the theme using the purchase code by clicking OnAir in the left menu to access demo contents', 'onair2' ); ?></strong></p>
	 		<?php  
	 		return;
	 	}
		if( json_decode( base64_decode( base64_decode( $actk )) )->url !== $sitehost ) {
			?>
			<h2><?php esc_html_e( 'License Activation Error', 'onair2' ); ?></h2>
			<p><strong><?php esc_html_e( 'This purchase code is connected to another website, you cannot use it on this domain.', 'onair2' ); ?></strong></p>
			<p><?php esc_html_e( 'If you need support please contact our helpdesk: https://www.qantumthemes.com/helpdesk/', 'onair2' ); ?></p>
			<?php
			return;
		}
		?>
		<p style="font-weight:700"><?php esc_html_e('If the import process gets stuck for more than 10 minutes, and is not complete, please reload this page and click again the Import Demo button. You can repeat the procedure until you see the confirmation message.', 'onair2'); ?></p>
		<p style="font-weight:700;color:#f00;"><?php esc_html_e('Please disable any plugin that was not provided with the theme.', 'onair2'); ?></p>
		<?php
		return ob_get_clean();
	}
}


/**
 * 
 * ==============================================================
 * Demo import array
 * ==============================================================
 * 
 */
// connection error
function onair2_plugins_conn__error() {
	?>
	<div class="notice notice-error is-dismissible">
		<h3><?php esc_html_e( 'Onair2 Notice', 'onair2' ); ?></h3>
		<p><?php esc_html_e( 'Your server is being blocked while searching for plugins. Please make sure your server or firewall are not blocking outgoing requests to our server.', 'onair2' ); ?></p>
		<p><?php esc_html_e( 'If you need support please contact our helpdesk: https://www.qantumthemes.com/helpdesk/', 'onair2' ); ?></p>
	</div>
	<?php
}

function onair2_ocdi_import_files() {
	if(!function_exists('qtt_iid')){
		echo('Missing core theme files, please reinstall the theme and try again. Click back on the browser.');
		return[];
	}

	if(!is_admin()){
		return[];
	}

	
	$quit_function = 1;
	$demos_list = get_transient('onair2_demos_list_trns' );
	if($demos_list){
		// echo $demos_list;
		$demos_list_array = json_decode( $demos_list, true );
		return $demos_list_array;
	}

	// Get the lists only in the dem import page
	global $pagenow;
	if($pagenow === 'themes.php'){
		if(isset($_GET)){
			if(array_key_exists('page', $_GET)){
				if($_GET['page'] == 'one-click-demo-import'){
					$quit_function = 0;
				}
			}
		}
	}
	if($quit_function) {
		return[];
	}


	$surl = get_site_url();
	$parsehost = parse_url($surl);
 	$sitehost = $parsehost['host']; 
 	$qtt_iid = qtt_iid();
 	$actk  = get_option( 'qtt_ack_'.trim( $qtt_iid ) );
 	if(!$actk  || false == $actk  || null == $actk ){
 		return [];
 	}
	if( json_decode( base64_decode( base64_decode( $actk )) )->url !== $sitehost ) {
		return [];
	}
	 /**
	 * Make list request
	 */
	 $args = array(
		'method'        => 'POST',
		'timeout'       => 300,
		'redirection'   => 5,
		'httpversion'   => '1.0',
		'blocking'      => true,
		'user-agent'    => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.8; rv:20.0) Gecko/20100101 Firefox/20.0',
		'headers'       => array(),
		'body'          => array(
			'act_key'   	=> $actk,
			'iid'       	=> $qtt_iid,
			'site_host' => $sitehost
		),
	);

	$url_ocdi = 'https://qantumthemes.xyz/t2gconnector-comm/onair2/ocdi/OCDI-JSON/index.php';

	$request = wp_remote_post(  $url_ocdi.'?getdemo='.$actk , $args );

	// Validate received data
	if( is_wp_error( $request ) ){
		$error_message = $response->get_error_message();
		add_action( 'admin_notices', 'onair2_plugins_conn__error' );
		die();
		exit;
	} else {
		if( $request['response']['code'] == '200' ){
			$demos_list = $request['body'];
			set_transient('onair2_demos_list_trns', $demos_list, 60*30 );
			$demos_list_array = json_decode( $demos_list, true );
			return $demos_list_array;
		} else {
			add_action( 'admin_notices', function() use ($request){
				?>
				<div class="notice notice-error is-dismissible">
					<p><?php esc_html_e( 'Server message', 'onair2' ); ?>: <?php print_r( $request['body'] ); ?></p>
				</div>
				<?php
			} );
			return array();
		}
	}
	return $demos;
}
add_filter( 'pt-ocdi/import_files', 'onair2_ocdi_import_files' );





function onair2_ocdi_after_import_setup( $selected_import ) {

	// use the name of the selected import
	$demo_name =  $selected_import['import_file_name'];

	

	// All the same
	$primary = get_term_by( 'name', 'Main', 'nav_menu' );
	$secondary = get_term_by( 'name', 'Top menu', 'nav_menu' );
	$footer = get_term_by( 'name', 'Footer', 'nav_menu' );
	$front_page = get_page_by_title( 'Home 01' );

	/**
	 * 
	 * Set the home
	 * 
	 */
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page->ID );


	/**
	 * 
	 * Set the menus
	 * 
	 */
	$menus = array();
	if( isset( $primary ) ){
		$menus['primary'] = $primary->term_id;
	}
	if( isset( $secondary ) ){
		$menus['secondary'] = $secondary->term_id;
	}
	if( isset( $footer ) ){
		$menus['footer'] = $footer->term_id;
	}

	if( count( $menus ) >= 1 ){ // If my array has items, set them
		set_theme_mod( 'nav_menu_locations', $menus );
	}

	delete_transient('onair2_demos_list_trns' );

}
add_action( 'pt-ocdi/after_import', 'onair2_ocdi_after_import_setup' );