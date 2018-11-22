<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('sage/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('sage/main.js', asset_path('scripts/main.js'), ['jquery'], null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('my_nonce'),
    );

    wp_localize_script('sage/main.js', 'ajax_object', $ajax_params);

    if($google_maps_key = the_field('google_maps_api_key', 'option')){
        wp_enqueue_script('google_maps', "https://maps.googleapis.com/maps/api/js?key={$google_maps_key}&callback=initMap", null, true);
    }

}, 100);

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');
    add_theme_support('soil-js-to-footer');

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Use main stylesheet for visual editor
     * @see resources/assets/styles/layouts/_tinymce.scss
     */
    add_editor_style(asset_path('styles/main.css'));

    add_image_size('width-300', 300, 300);
    add_image_size('width-400', 400, 400);
    add_image_size('width-500', 500, 500);
    add_image_size('width-600', 600, 600);
    add_image_size('width-700', 700, 700);
    add_image_size('width-800', 800, 800);
    add_image_size('width-900', 900, 900);
    add_image_size('width-1000', 1000, 1000);
    add_image_size('width-1200', 1200, 1200);
    add_image_size('width-1600', 1600, 1600);
}, 20);

/**
 * Register sidebars
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ];
    register_sidebar([
        'name'          => __('Primary', 'sage'),
        'id'            => 'sidebar-primary'
    ] + $config);
    register_sidebar([
        'name'          => __('Footer', 'sage'),
        'id'            => 'sidebar-footer'
    ] + $config);
});

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

add_action( 'init', function() {
    register_extended_post_type( 'medarbejder', [], [
        'singular' => 'Medarbejder',
        'plural' => 'Medarbejdere',
    ] );
    register_extended_post_type( 'portfolie', [], [
        'singular' => 'portfolie',
        'plural' => 'portfolier',
    ] );
    register_extended_post_type( 'anmeldelser', [], [
        'singular' => 'anmeldelse',
        'plural' => 'anmeldelser',
    ] );
    register_extended_post_type( 'haandvaerk', [], [
        'singluar' => 'haandvaerk',
        'plural' => 'haandvaerk'
    ] );
    register_extended_taxonomy( 'genre', 'haandvaerk', [
        # Add a custom column to the admin screen:
        'admin_cols' => [
            'updated' => [
                'title'       => 'Updated',
                'meta_key'    => 'updated_date',
                'date_format' => 'd/m/Y'
            ],
        ],

    ] );
} );

add_action( 'wp_ajax_get_gallery', function() {
    $id = $_GET['id'];
    $post_gallery = get_field('galleri', $id);
    $content = get_post_field('post_content', $id);
    $output = '<div class="gallery-wrapper"><div class="col-10 offset-1 text-center">'.get_the_title($id).'</div><div class="col-10 offset-1 mb-5">'.$content.'</div>'; 
    foreach($post_gallery as $index => $gallery){
        $class;
        switch($index){
            case 0:
            case 5:
            case 9:
            case 14:
            case 16:
            case 18:
            case 21:
            case 22:
            case 25:
            case 31:
            case 32:
                $class = 'img-300';
                break;
            case 1:
            case 2:
            case 4:
            case 7:
            case 8:
            case 10:
            case 12:
            case 13:
            case 17:
            case 19:
            case 23:
            case 24:
            case 26:
            case 28:
            case 30:
            case 33:
                $class = 'img-400';
                break;
            case 3:
                $class = 'img-600';
                break;
            case 6:
            case 11:
            case 15:
            case 20:
            case 27:
            case 29:
                $class = 'img-500';
                break;
            default:
                $class = 'img-300';
                break;
        };
        $img_src = wp_get_attachment_image_url( $gallery['id'], 'full' );
        $img_srcset = wp_get_attachment_image_srcset( $gallery['id'], 'full' );
        $output .= '<div class="portfolio__item"><a class="gallery-image" href="'.$img_src.'"><img class="'.$class.'" src="'. esc_url( $img_src ) .'" srcset="'.esc_attr( $img_srcset ).'"></a></div>';
    }
    $output .= '</div>';
    wp_send_json($output);
} );

add_action( 'wp_ajax_nopriv_get_gallery', function() {
    $id = $_GET['id'];
    $post_gallery = get_field('galleri', $id);
    $content = get_post_field('post_content', $id);
    $output = '<div class="gallery-wrapper"><div class="col-10 offset-1 text-center">'.get_the_title($id).'</div><div class="col-10 offset-1 mb-5">'.$content.'</div>'; 
    foreach($post_gallery as $index => $gallery){
        $class;
        switch($index){
            case 0:
            case 5:
            case 9:
            case 14:
            case 16:
            case 18:
            case 21:
            case 22:
            case 25:
            case 31:
            case 32:
                $class = 'img-300';
                break;
            case 1:
            case 2:
            case 4:
            case 7:
            case 8:
            case 10:
            case 12:
            case 13:
            case 17:
            case 19:
            case 23:
            case 24:
            case 26:
            case 28:
            case 30:
            case 33:
                $class = 'img-400';
                break;
            case 3:
                $class = 'img-600';
                break;
            case 6:
            case 11:
            case 15:
            case 20:
            case 27:
            case 29:
                $class = 'img-500';
                break;
            default:
                $class = 'img-300';
                break;
        };
        $img_src = wp_get_attachment_image_url( $gallery['id'], 'full' );
        $img_srcset = wp_get_attachment_image_srcset( $gallery['id'], 'full' );
        $output .= '<div class="portfolio__item"><a class="gallery-image" href="'.$img_src.'"><img class="'.$class.'" src="'. esc_url( $img_src ) .'" srcset="'.esc_attr( $img_srcset ).'"></a></div>';
    }
    $output .= '</div>';
    wp_send_json($output);
} );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}


