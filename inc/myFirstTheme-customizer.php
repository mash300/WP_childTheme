<?php
class MyFirstTheme_Customizer {
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_customize_sections' ) );
	}
	public function register_customize_sections( $wp_customize ) {
        /*
        * Add settings to sections.
        */
        $this->author_callout_section( $wp_customize );
        // This registers a second customizer section for color!!!
        $this->color_callout_section( $wp_customize );
    }
    

    /* Sanitize Inputs */
    public function sanitize_custom_option($input) {
        return ( $input === "No" ) ? "No" : "Yes";
    }
    public function sanitize_custom_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }

    // public function sanitize_color_option($input) {
    //     return ( $input === "No" ) ? "No" : "Yes";
    // }

    // public function sanitize_color_option($input) {
    //     return ( $input );
    // }

    public function sanitize_color_option($input) {
        return ( $input == "Black" ) ? "Red" : "Blue";
    }
    public function sanitize_color_text($input) {
        return filter_var($input, FILTER_SANITIZE_STRING);
    }
    public function sanitize_custom_url($input) {
        return filter_var($input, FILTER_SANITIZE_URL);
    }
    public function sanitize_custom_email($input) {
        return filter_var($input, FILTER_SANITIZE_EMAIL);
    }
    public function sanitize_hex_color( $color ) {
        if ( '' === $color ) {
            return '';
        }
     
        // 3 or 6 hex digits, or the empty string.
        if ( preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
            return $color;
        }
    }
  
    /* Author Section */
    private function author_callout_section( $wp_customize ) {
		// New panel for "Layout".
        // This adds the new section!!
        $wp_customize->add_section('basic-author-callout-section', array(
            'title' => 'Author',
            'priority' => 2,
            'description' => __('The Author section is only displayed on the Blog page.', 'myFirstTheme'),
        ));
    
        // This adds a new setting to the section!!!
        $wp_customize->add_setting('basic-author-callout-display', array(
            'default' => 'No',
            'sanitize_callback' => array( $this, 'sanitize_custom_option' )
        ));

        // This adds a controll to the section for the new setting!!!
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-author-callout-display-control', array(
            'label' => 'Display this section?',
            'section' => 'basic-author-callout-section',
            'settings' => 'basic-author-callout-display',
            'type' => 'select',
            'choices' => array('No' => 'No', 'Yes' => 'Yes')
        )));
        $wp_customize->add_setting('basic-author-callout-text', array(
            'default' => '',
            'sanitize_callback' => array( $this, 'sanitize_custom_text' )
        ));

        // $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-author-callout-control', array(
        //     'label' => 'About Author',
        //     'section' => 'basic-author-callout-section',
        //     'settings' => 'basic-author-callout-text',
        //     'type' => 'textarea'
        // )));
         
        // $wp_customize->add_setting('basic-author-callout-image', array(
        //     'default' => '',
        //     'type' => 'theme_mod',
        //     'capability' => 'edit_theme_options',
        //     'sanitize_callback' => array( $this, 'sanitize_custom_url' )
        // ));
    
        // $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'basic-author-callout-image-control', array(
        //     'label' => 'Image',
        //     'section' => 'basic-author-callout-section',
        //     'settings' => 'basic-author-callout-image',
        //     'width' => 442,
        //     'height' => 310
        // )));
    }

        /* Color Section */
        private function color_callout_section( $wp_customize ) {
            // New panel for "Layout".
            // This adds the new section!!
            $wp_customize->add_section('basic-color-callout-section', array(
                'title' => 'Color',
                'priority' => 3,
                'description' => __('The Color section is only displayed on the Blog page.', 'myFirstTheme'),
            ));
        
            // This adds a new setting to the section!!!
            $wp_customize->add_setting('basic-color-callout-display', array(
                'default' => 'Black',
                'sanitize_callback' => array( $this, 'sanitize_color_option' )
                // something is happening here
            ));
    
            // This adds a controll to the section for the new setting!!!
            $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'basic-color-callout-display-control', array(
                'label' => 'Display this section?',
                'section' => 'basic-color-callout-section',
                'settings' => 'basic-color-callout-display',
                'type' => 'select',
                'choices' => array('#000000' => 'Black', '#cf2e2e' => 'Red', '#cf2e2e' => 'Blue')
            )));

            $wp_customize->add_setting('basic-color-callout-text', array(
                'default' => 'Black',
                'sanitize_callback' => array( $this, 'sanitize_hex_color' )
            ));


        }
}