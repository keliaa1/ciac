<?php

class Ecology_Nature_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $ecology_nature_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $ecology_nature_recommended_actions_title;
	
	private $ecology_nature_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $ecology_nature_install_button_label;
	
	private $ecology_nature_activate_button_label;
	
	private $ecology_nature_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Ecology_Nature_Customizer_Notify ) ) {
			self::$instance = new Ecology_Nature_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $ecology_nature_customizer_notify_recommended_plugins;
		global $ecology_nature_customizer_notify_ecology_nature_recommended_actions;

		global $ecology_nature_install_button_label;
		global $ecology_nature_activate_button_label;
		global $ecology_nature_deactivate_button_label;

		$this->ecology_nature_recommended_actions = isset( $this->config['ecology_nature_recommended_actions'] ) ? $this->config['ecology_nature_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->ecology_nature_recommended_actions_title = isset( $this->config['ecology_nature_recommended_actions_title'] ) ? $this->config['ecology_nature_recommended_actions_title'] : '';
		$this->ecology_nature_recommended_plugins_title = isset( $this->config['ecology_nature_recommended_plugins_title'] ) ? $this->config['ecology_nature_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$ecology_nature_customizer_notify_recommended_plugins = array();
		$ecology_nature_customizer_notify_ecology_nature_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$ecology_nature_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->ecology_nature_recommended_actions ) ) {
			$ecology_nature_customizer_notify_ecology_nature_recommended_actions = $this->ecology_nature_recommended_actions;
		}

		$ecology_nature_install_button_label    = isset( $this->config['ecology_nature_install_button_label'] ) ? $this->config['ecology_nature_install_button_label'] : '';
		$ecology_nature_activate_button_label   = isset( $this->config['ecology_nature_activate_button_label'] ) ? $this->config['ecology_nature_activate_button_label'] : '';
		$ecology_nature_deactivate_button_label = isset( $this->config['ecology_nature_deactivate_button_label'] ) ? $this->config['ecology_nature_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'ecology_nature_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'ecology_nature_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'ecology_nature_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'ecology_nature_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function ecology_nature_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'ecology-nature-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/ecology-nature-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'ecology-nature-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/ecology-nature-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'ecology-nature-customizer-notify-js', 'ecologynatureCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'ecology-nature' ),
			)
		);

	}

	
	public function ecology_nature_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/ecology-nature-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Ecology_Nature_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Ecology_Nature_Customizer_Notify_Section(
				$wp_customize,
				'ecology-nature-customizer-notify-section',
				array(
					'title'          => $this->ecology_nature_recommended_actions_title,
					'plugin_text'    => $this->ecology_nature_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function ecology_nature_customizer_notify_dismiss_recommended_action_callback() {

		global $ecology_nature_customizer_notify_ecology_nature_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'ecology_nature_customizer_notify_show' ) ) {

				$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions = get_option( 'ecology_nature_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'ecology_nature_customizer_notify_show', $ecology_nature_customizer_notify_show_ecology_nature_recommended_actions );

				
			} else {
				$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions = array();
				if ( ! empty( $ecology_nature_customizer_notify_ecology_nature_recommended_actions ) ) {
					foreach ( $ecology_nature_customizer_notify_ecology_nature_recommended_actions as $ecology_nature_lite_customizer_notify_recommended_action ) {
						if ( $ecology_nature_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions[ $ecology_nature_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$ecology_nature_customizer_notify_show_ecology_nature_recommended_actions[ $ecology_nature_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'ecology_nature_customizer_notify_show', $ecology_nature_customizer_notify_show_ecology_nature_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function ecology_nature_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$ecology_nature_lite_customizer_notify_show_recommended_plugins = get_option( 'ecology_nature_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$ecology_nature_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$ecology_nature_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'ecology_nature_customizer_notify_show_recommended_plugins', $ecology_nature_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
