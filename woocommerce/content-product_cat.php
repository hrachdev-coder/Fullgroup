<?php
defined( 'ABSPATH' ) || exit;

$children = get_terms([
    'taxonomy'   => 'product_cat',
    'parent'     => $category->term_id,
    'hide_empty' => false,
    'fields'     => 'ids',
]);

$has_children = ! empty( $children );
?>

<li <?php wc_product_cat_class( '', $category ); ?>>

    <?php if ( ! $has_children ) : ?>
        <a href="<?php echo esc_url( get_term_link( $category ) ); ?>">
    <?php endif; ?>

        <?php
        /**
         * Category thumbnail
         */
        do_action( 'woocommerce_before_subcategory_title', $category );

        /**
         * Category title
         */
        do_action( 'woocommerce_shop_loop_subcategory_title', $category );
        ?>

    <?php if ( ! $has_children ) : ?>
        </a>
    <?php endif; ?>

</li>