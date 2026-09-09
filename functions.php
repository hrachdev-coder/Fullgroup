<?php
/**
 * Full group functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Full_group
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function full_group_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Full group, use a find and replace
		* to change 'full-group' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'full-group', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'full-group' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'full_group_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'full_group_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function full_group_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'full_group_content_width', 640 );
}
add_action( 'after_setup_theme', 'full_group_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function full_group_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'full-group' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'full-group' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'full_group_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function full_group_scripts() {

    wp_enqueue_style(
        'full-group-style',
        get_template_directory_uri() . '/assets/styles/style.css',
        array(),
        _S_VERSION
    );

    wp_enqueue_script(
        'full-group-navigation',
        get_template_directory_uri() . '/js/navigation.js',
        array(),
        _S_VERSION,
        true
    );
 	wp_enqueue_script(
        'main-script',
        get_template_directory_uri() . '/assets/scripts/script.js',
        array(),
        _S_VERSION,
        true
    );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'full_group_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}





// Disable comments everywhere
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);



/* =====================================
   FULL GROUP - CATALOG MODE
===================================== */

// Remove Add to Cart from shop/category pages
remove_action(
    'woocommerce_after_shop_loop_item',
    'woocommerce_template_loop_add_to_cart',
    10
);

// Remove Add to Cart from single product
remove_action(
    'woocommerce_single_product_summary',
    'woocommerce_template_single_add_to_cart',
    30
);


// Disable purchasing
add_filter('woocommerce_is_purchasable', '__return_false');


// Redirect Cart and Checkout to Shop
function full_group_disable_cart_checkout() {

    if (is_cart() || is_checkout()) {
        wp_safe_redirect(wc_get_page_permalink('shop'));
        exit;
    }
}
add_action('template_redirect', 'full_group_disable_cart_checkout');



function full_group_product_phone_button() {
    ?>
    <div class="product-phone-box">
        <div class="product-phone-text">
            Հարցեր ունե՞ք ապրանքի վերաբերյալ
        </div>

        <a href="tel:+37409045150" class="product-phone-button">
            Զանգահարել՝ +374 095 04 51 50
        </a>
        <div class="product-info-subtext">
           Երաշխիքային ժամկետը՝ 48 ամիս, ապրանքի առաքման ժամկետը՝ 1-3 աշխատանքային օր
        </div>
    </div>
    <?php
}

add_action(
    'woocommerce_single_product_summary',
    'full_group_product_phone_button',
    25
);


add_filter('woocommerce_page_title', function ($title) {

    if (is_shop()) {
        return 'Ապրանքներ';
    }

    return $title;
});


function full_group_change_shop_title($title, $post_id) {

    if (is_admin()) {
        return $title;
    }

    $shop_page_id = wc_get_page_id('shop');

    if ($post_id == $shop_page_id) {
        return 'Ապրանքներ';
    }

    return $title;
}

add_filter('the_title', 'full_group_change_shop_title', 20, 2);





add_filter('gettext', function ($translated, $text, $domain) {

    if ($domain === 'woocommerce') {

        switch ($text) {

            case 'Default sorting':
                return 'Դասավորել ըստ';

            case 'Sort by popularity':
                return 'Ըստ հանրաճանաչության';

            case 'Sort by average rating':
                return 'Ըստ գնահատականի';

            case 'Sort by latest':
                return 'Նորերը սկզբում';

            case 'Sort by price: low to high':
                return 'Գինը՝ ցածրից բարձր';

            case 'Sort by price: high to low':
                return 'Գինը՝ բարձրից ցածր';
        }
    }

    return $translated;

}, 20, 3);










add_filter('woocommerce_sale_flash', function ($html, $post, $product) {
    return '<span class="onsale">Զեղչ</span>';
}, 10, 3);







function full_group_rename_product_tabs($tabs) {

    if (isset($tabs['description'])) {
        $tabs['description']['title'] = 'Նկարագրություն';
    }

    if (isset($tabs['additional_information'])) {
        $tabs['additional_information']['title'] = 'Լրացուցիչ տեղեկություններ';
    }

    if (isset($tabs['reviews'])) {
        $tabs['reviews']['title'] = 'Կարծիքներ';
    }

    return $tabs;
}

add_filter('woocommerce_product_tabs', 'full_group_rename_product_tabs', 98);






add_filter('woocommerce_product_meta_start', function () {
    ob_start();
});

add_filter('woocommerce_product_meta_end', function () {
    $html = ob_get_clean();

    $html = str_replace('Category:', 'Կատեգորիա՝', $html);
    $html = str_replace('Categories:', 'Կատեգորիաներ՝', $html);
    $html = str_replace('SKU:', 'Ապրանքի կոդ՝', $html);

    echo $html;
});



add_filter('woocommerce_product_description_heading', function () {
    return 'Նկարագրություն';
});


add_filter('woocommerce_product_related_products_heading', function () {
    return 'Նմանատիպ ապրանքներ';
});







// function full_group_show_product_filter() {

//     if ( is_shop() || is_product_category() ) {
//         get_template_part( 'woocommerce/product-filter' );
//     }

// }

// add_action(
//     'woocommerce_before_shop_loop',
//     'full_group_show_product_filter',
//     5
// );


/**
 * Open shop layout
 */
function full_group_shop_layout_open() {

    if ( ! is_shop() && ! is_product_category() ) {
        return;
    }

    echo '<div class="fg-shop-layout">';

        // Left filter
        get_template_part( 'woocommerce/product-filter' );

        // Right products area
        echo '<div class="fg-shop-products">';
}

add_action(
    'woocommerce_before_shop_loop',
    'full_group_shop_layout_open',
    5
);


/**
 * Close shop layout
 */
function full_group_shop_layout_close() {

    if ( ! is_shop() && ! is_product_category() ) {
        return;
    }

        echo '</div>'; // .fg-shop-products
    echo '</div>'; // .fg-shop-layout
}

add_action(
    'woocommerce_after_shop_loop',
    'full_group_shop_layout_close',
    99
);
















/**
 * Full Group - WooCommerce attribute filtering
 */
function full_group_attribute_filter_query( $tax_query, $query ) {
    

    if ( is_admin() ) {
        return $tax_query;
    }

    $attributes = wc_get_attribute_taxonomies();

    foreach ( $attributes as $attribute ) {

        $attribute_name = $attribute->attribute_name;

        // օրինակ՝ pa_brand
        $taxonomy = wc_attribute_taxonomy_name( $attribute_name );

        // օրինակ՝ filter_brand
        $param = 'filter_' . $attribute_name;

        if ( empty( $_GET[ $param ] ) ) {
            continue;
        }

        $selected_terms = array_map(
            'sanitize_title',
            (array) wp_unslash( $_GET[ $param ] )
        );

        $selected_terms = array_filter( $selected_terms );

        if ( empty( $selected_terms ) ) {
            continue;
        }

        $tax_query[] = array(
            'taxonomy' => $taxonomy,
            'field'    => 'slug',
            'terms'    => $selected_terms,
            'operator' => 'IN',
        );
    }

    return $tax_query;
}
/**
 * Full Group - Price filter
 */
function full_group_price_filter_query( $meta_query, $query ) {

    if ( is_admin() ) {
        return $meta_query;
    }

    if (
        ! is_shop() &&
        ! is_product_category()
    ) {
        return $meta_query;
    }

    // Minimum price
    if (
        isset( $_GET['min_price'] ) &&
        $_GET['min_price'] !== ''
    ) {

        $min_price = (float) wc_clean(
            wp_unslash( $_GET['min_price'] )
        );

        $meta_query[] = array(
            'key'     => '_price',
            'value'   => $min_price,
            'compare' => '>=',
            'type'    => 'NUMERIC',
        );
    }

    // Maximum price
    if (
        isset( $_GET['max_price'] ) &&
        $_GET['max_price'] !== ''
    ) {

        $max_price = (float) wc_clean(
            wp_unslash( $_GET['max_price'] )
        );

        $meta_query[] = array(
            'key'     => '_price',
            'value'   => $max_price,
            'compare' => '<=',
            'type'    => 'NUMERIC',
        );
    }

    return $meta_query;
}

add_filter(
    'woocommerce_product_query_meta_query',
    'full_group_price_filter_query',
    20,
    2
);

add_filter(
    'woocommerce_product_query_tax_query',
    'full_group_attribute_filter_query',
    20,
    2
);











