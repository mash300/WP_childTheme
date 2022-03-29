<?php
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'child-style', get_stylesheet_uri(),
            array( 'parenthandle' ), 
            wp_get_theme()->get('Version') // this only works if you have Version in the style header
        );
    }

    // Customizer Settings
    require get_stylesheet_directory() . '/inc/myFirstTheme-customizer.php';
    new MyFirstTheme_Customizer();

    // // Load my stylesheet
    // wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');

    // add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_styles', 11 );
    // function mytheme_enqueue_styles()
    //     {
    //         wp_enqueue_style( 'child-style', get_stylesheet_uri() . '/style.css' );
    //     }

    // This actually worked!!!!!!  After so long without it ever working!!!!!
    add_action( 'wp_enqueue_scripts', 'myFirstThemechild_enqueue_styles', 11 );
    function myFirstThemechild_enqueue_styles()
        {
            wp_enqueue_style( 'parent-style', get_stylesheet_uri() . '/style.css' );
            wp_enqueue_style( 'child-style', get_stylesheet_uri() . '/style.css' );
        }



        // add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
        // function my_theme_enqueue_styles() {
        //     wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        //         array( 'myFirstTheme' ), 
        //         wp_get_theme()->get('1.0.0') // this only works if you have Version in the style header
        //     );
        // }

?>