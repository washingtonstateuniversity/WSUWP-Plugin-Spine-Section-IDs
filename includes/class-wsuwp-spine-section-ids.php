<?php

class WSUWP_Spine_Section_Ids {
	/**
	 * @var WSUWP_Spine_Section_Ids
	 */
	private static $instance;

	/**
	 * Maintain and return the one instance. Initiate hooks when
	 * called the first time.
	 *
	 * @since 0.0.1
	 *
	 * @return \WSUWP_Spine_Section_Ids
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new WSUWP_Spine_Section_Ids();
			self::$instance->setup_hooks();
		}
		return self::$instance;
	}

	/**
	 * Setup hooks to include.
	 *
	 * @since 0.0.1
	 */
	public function setup_hooks() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_styles' ), 15 );
		add_action( 'spine_output_builder_section', array( $this, 'output_builder_section_ids' ), 10, 3 );
		add_filter( 'spine_builder_save_columns', array( $this, 'save_builder_columns' ), 10, 2 );
		add_filter( 'spine_builder_save_banner',  array( $this, 'save_builder_columns' ), 10, 2 );
		add_filter( 'spine_builder_save_header',  array( $this, 'save_builder_columns' ), 10, 2 );
	}

	/**
	 * Enqueue the scripts and styles used in admin views while this theme is active.
	 *
	 * @since 0.0.1
	 */
	public function enqueue_admin_styles() {
		if ( 'page' === get_current_screen()->id ) {
			wp_enqueue_style( 'spine-section-ids-builder-styles', plugins_url( '/css/sections.css', dirname( __FILE__ ) ), array(), false );
		}
	}

	/**
	 * Output the HTML required to capture section ID and anchor text for a section.
	 *
	 * @since 0.0.1
	 *
	 * @param $section_name
	 * @param $ttfmake_section_data
	 * @param $context
	 */
	public function output_builder_section_ids( $section_name, $ttfmake_section_data, $context ) {
		$section_id = isset( $ttfmake_section_data['data']['section-id'] ) ? $ttfmake_section_data['data']['section-id'] : '';
		$section_anchor_text = isset( $ttfmake_section_data['data']['section-anchor-text'] ) ? $ttfmake_section_data['data']['section-anchor-text'] : '';
		?>
		<div class="wsuwp-builder-meta" style="width:100%; margin-top:10px;">
			<label for="<?php echo esc_attr( $section_name ); ?>[section-anchor-text]">Section Anchor Text:</label>
			<input type="text" id="<?php echo esc_attr( $section_name ); ?>[section-anchor-text]"
			       class="wsuwp-builder-section-anchor-text widefat"
			       name="<?php echo esc_attr( $section_name ); ?>[section-anchor-text]"
			       value="<?php echo esc_attr( $section_anchor_text ); ?>" />
			<p class="description">A short title for this section. Used in navigation at the top of the page.</p>
			<label for="<?php echo esc_attr( $section_name ); ?>[section-id]">Section Id:</label>
			<input type="text" id="<?php echo esc_attr( $section_name ); ?>[section-id]" class="wsuwp-builder-section-id widefat" name="<?php echo esc_attr( $section_name ); ?>[section-id]" value="<?php echo esc_attr( $section_id ); ?>" />
			<p class="description">A single ID to be applied to this <code>section</code> element.</p>
		</div>
		<?php
	}

	/**
	 * Save additional builder data for columns not handled by the parent theme.
	 *
	 * @param array $clean_data Current array of cleaned data for storage.
	 * @param array $data       Original array of data.
	 *
	 * @return array Cleaned data with our updates.
	 */
	public function save_builder_columns( $clean_data, $data ) {
		if ( isset( $data['section-id'] ) ) {
			$clean_data['section-id'] = sanitize_key( $data['section-id'] );
		}

		if ( isset( $data['section-anchor-text'] ) ) {
			$clean_data['section-anchor-text'] = sanitize_text_field( esc_html( $data['section-anchor-text'] ) );
		}

		return $clean_data;
	}
}
