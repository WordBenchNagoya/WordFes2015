<?php
/*
Contributors: katz515
Plugin Name: Ustream Status
Plugin URI: http://katzueno.com/wordpress/ustream-status/
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=R8S6WTYMY9SXG
Description: Display the online/offline status of a Ustream channel.
Version: 2.0.1
Author: Katz Ueno
Author URI: http://katzueno.com/
Tags: livecasting, status, ustream, live cast
License: GPL2
*/

/*  Copyright 2015  Katsuyuki Ueno  (email : katz515@deerstudio.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

class wp_ustream_status_widget extends WP_Widget {

	// ============================================================
	// Constructer
	// ============================================================
    function wp_ustream_status_widget () {
		$widget_ops = array(
        'description' => 'Display Ustream online status'
        );
	    parent::WP_Widget(false, $name = 'Ustream Status',$widget_ops);
    }

	// ============================================================
    // Form
	// ============================================================
    function form( $instance ) {
		//Reading the existing data from $instance
		$instance = wp_parse_args( (array) $instance, array( 'account' => 'YokosoNews', 'online' => '', 'offline' => '') );
		$account = esc_attr( $instance['account'] );
		$online = esc_attr( $instance['online'] );
		$offline = esc_attr( $instance['offline'] );
    ?>
    <!--Form-->
    <p><label for="<?php echo $this->get_field_id('account'); ?>"><?php _e('Ustream channel name or URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('account'); ?>" name="<?php echo $this->get_field_name('account'); ?>" type="text" value="<?php echo $account; ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('online'); ?>"><?php _e('Online image URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('online'); ?>" name="<?php echo $this->get_field_name('online'); ?>" type="text" value="<?php echo $online; ?>" /></label></p>

    <p><label for="<?php echo $this->get_field_id('offline'); ?>"><?php _e('Offline image URL:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('offline'); ?>" name="<?php echo $this->get_field_name('offline'); ?>" type="text" value="<?php echo $offline; ?>" /></label></p>
    <!--/Form-->
    <?php    }


	// ============================================================
    // Update
	// ============================================================
    function update( $new_instance, $old_instance ) {
    // Old Instance and New instance
    		$instance = $old_instance;
    		$instance['account'] = preg_replace("#^.*/([^/]+)/?$#",'${1}', $new_instance['account']);
    		$instance['online'] = esc_url( $new_instance['online'] );
    		$instance['offline'] = esc_url( $new_instance['offline'] );
    return $instance;
    }

	// ============================================================
	// View
	// ============================================================
	function widget( $args, $instance ) {

		extract($args);
		$account = esc_html($instance['account']);
		$online = esc_url($instance['online']);
		$offline = esc_url($instance['offline']);

        echo $before_widget;
		if ( $account )
		echo $before_title . 'Ustream Status' . $after_title;
		// ==============================
		// Ustream Status starts here
		// ==============================
		// TRANSIENT STARTS HERE
        $transientName = 'wp_ustream_status_' . $account;
		if ( false === ( $UstStatusArray = get_transient( $transientName ) ) ) {
			$opt = stream_context_create(array(
			'http' => array( 'timeout' => 3 )
			));
			$UstStatusSerial = @file_get_contents('http://api.ustream.tv/php/channel/' . $account . '/getValueOf/status',0,$opt);
			$UstStatusArray = unserialize($UstStatusSerial);
			set_transient($transientName, $UstStatusArray, 60 );
		}
		// TRANSIENT ENDS HERE
			// For DEBUG
			// echo '<!--' . $UstStatusArray . '-->';
		// Decode JSON
		switch ( $UstStatusArray['results'] )
			{
			case 'live':
				$UstStatus = 1;
			break;
			case 'offline':
				$UstStatus = 2;
			break;
			case 'error':
				$UstStatus = false;
			break;
			}
		if ($UstStatus == 1) {
		?>
			<div align="center"><a href="http://www.ustream.tv/channel/<?php echo $account;?>" alt="<?php _e('Click here to visit the Ustream channel'); ?>" target="_blank">
			<img src="<?php echo $online; ?>" alt="<?php _e('Live now'); ?>" target="_blank" />
			</a></div>
		<?php
		// ONLINE part ends here
		}
		else if ($UstStatus == 2) {
			// If not live, including when the API does not respond
			?>
			<div align="center"><a href="http://www.ustream.tv/channel/<?php echo $account;?>" alt="<?php _e('Click here to visit the Ustream channel'); ?>" target="_blank">
			<img src="<?php echo $offline; ?>" alt="<?php _e('Offline'); ?>" />
			</a></div>
		<?php } else {
			echo _e('Error occured. We could not retrieve the data from Ustream.');
		}
		// ==============================
		// Ustream Status ends here
		// ==============================
		echo $after_widget;
	}
}

// ============================================================
// Registering plug-ins
// [ustream-status online='online image URL' offline='offline image URL' account='http://www.ustream.tv/concrete5japan']
// ============================================================
function ustream_status_shortcode($atts) {
    // do something
    $account = preg_replace("#^.*/([^/]+)/?$#",'${1}',$atts['channel']);
    $online = esc_url($atts['online']);
    $offline = esc_url($atts['offline']);

    // TRANSIENT STARTS HERE
    $transientName = 'wp_ustream_status_' . $account;
    if ( false === ( $UstStatusArray = get_transient( $transientName ) ) ) {
        $opt = stream_context_create(array(
        'http' => array( 'timeout' => 3 )
        ));
        $UstStatusSerial = @file_get_contents('http://api.ustream.tv/php/channel/' . $account . '/getValueOf/status',0,$opt);
        $UstStatusArray = unserialize($UstStatusSerial);
        set_transient($transientName, $UstStatusArray, 60 );
    }
    // TRANSIENT ENDS HERE

    switch ( $UstStatusArray['results'] )
        {
        case 'live':
            $UstStatus = 1;
        break;
        case 'offline':
            $UstStatus = 2;
        break;
        case 'error':
            $UstStatus = false;
        break;
        }
    if ($UstStatus == 1) {
    ?>
        <a href="http://www.ustream.tv/channel/<?php echo $account;?>" alt="<?php _e('Click here to visit the Ustream channel'); ?>" target="_blank">
        <img src="<?php echo $online; ?>" alt="<?php _e('Live now'); ?>" target="_blank" />
        </a>
    <?php
    // ONLINE part ends here
    }
    else if ($UstStatus == 2) {
        // If not live, including when the API does not respond
        ?>
        <a href="http://www.ustream.tv/channel/<?php echo $account;?>" alt="<?php _e('Click here to visit the Ustream channel'); ?>" target="_blank">
        <img src="<?php echo $offline; ?>" alt="<?php _e('Offline'); ?>" />
        </a>
    <?php } else {
        echo _e('Error occured. We could not retrieve the data from Ustream.');
    }

    return;
}

// ============================================================
// Registering plug-ins
// ============================================================
function wpUstreamStatusInit() {
    // Registering class name
    register_widget('wp_ustream_status_widget');
}

// ============================================================
// execute wpUstreamStatusInit()
// ============================================================
add_action('widgets_init', 'wpUstreamStatusInit');
add_shortcode('ustream-status', 'ustream_status_shortcode' );
?>
