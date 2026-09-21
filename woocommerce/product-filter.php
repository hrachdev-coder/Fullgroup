<?php
defined( 'ABSPATH' ) || exit;

/**
 * Full Group Product Filter
 *
 * Category էջում՝
 * - ցույց է տալիս միայն տվյալ category-ի ապրանքների attributes-ը
 *
 * Shop էջում՝
 * - attribute filters չի ցույց տալիս
 * - ցույց է տալիս միայն Առկայություն + Գին
 */

if ( ! is_shop() && ! is_product_category() ) {
    return;
}


/* =========================================================
 * CURRENT CATEGORY PRODUCTS
 * ========================================================= */

$current_term = is_product_category()
    ? get_queried_object()
    : null;

$product_ids = array();

if (
    $current_term &&
    ! empty( $current_term->term_id )
) {

    $product_ids = get_posts(
        array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'fields'         => 'ids',

            'tax_query' => array(
                array(
                    'taxonomy'         => 'product_cat',
                    'field'            => 'term_id',
                    'terms'            => $current_term->term_id,
                    'include_children' => true,
                ),
            ),
        )
    );
}


/* =========================================================
 * GLOBAL ATTRIBUTES
 * ========================================================= */

$attributes = wc_get_attribute_taxonomies();


/* =========================================================
 * SELECTED STOCK
 * ========================================================= */

$selected_stock = isset( $_GET['stock_status'] )
    ? array_map(
        'sanitize_text_field',
        (array) wp_unslash( $_GET['stock_status'] )
    )
    : array();

?>

<button
    type="button"
    class="fg-filter-toggle"
    aria-expanded="false"
    aria-controls="fg-product-filter"
>
    <span class="fg-filter-toggle__text">Ֆիլտրեր</span>
    <span class="fg-filter-toggle__icon" aria-hidden="true">⌄</span>
</button>
<div class="filter-group filter-categories">

    <h3>Կատեգորիաներ</h3>

    <ul class="filter-category-list">

        <?php
        $parent_categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'parent'     => 0,
            'orderby'    => 'menu_order',
            'order'      => 'ASC',
        ]);

        if (!empty($parent_categories) && !is_wp_error($parent_categories)) :

            foreach ($parent_categories as $parent) :

                $children = get_terms([
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => true,
                    'parent'     => $parent->term_id,
                    'orderby'    => 'menu_order',
                    'order'      => 'ASC',
                ]);

                $has_children = !empty($children) && !is_wp_error($children);
        ?>

            <li class="filter-category-item <?php echo $has_children ? 'has-children' : ''; ?>">

                <div class="filter-category-row">

                    <a href="<?php echo esc_url(get_term_link($parent)); ?>">
                        <?php echo esc_html($parent->name); ?>
                    </a>

                    <?php if ($has_children) : ?>
                        <button
                            type="button"
                            class="filter-category-toggle"
                            aria-label="Բացել ենթակատեգորիաները"
                        >
                            +
                        </button>
                    <?php endif; ?>

                </div>

                <?php if ($has_children) : ?>

                    <ul class="filter-subcategory-list">

                        <?php foreach ($children as $child) : ?>

                            <li>
                                <a href="<?php echo esc_url(get_term_link($child)); ?>">
                                    <?php echo esc_html($child->name); ?>
                                </a>
                            </li>

                        <?php endforeach; ?>

                    </ul>

                <?php endif; ?>

            </li>

        <?php
            endforeach;
        endif;
        ?>

    </ul>

</div>

<aside class="fg-product-filter" id="fg-product-filter">

    <div class="fg-filter-title">
        ՖԻԼՏՐ
    </div>

    <form method="get" class="fg-filter-form">


        <!-- =================================================
             STOCK
        ================================================== -->

        <div class="fg-filter-group">

            <h3>Առկայություն</h3>

            <label>
                <input
                    type="checkbox"
                    name="stock_status[]"
                    value="instock"
                    <?php checked(
                        in_array(
                            'instock',
                            $selected_stock,
                            true
                        )
                    ); ?>
                >

                Առկա է
            </label>


            <label>
                <input
                    type="checkbox"
                    name="stock_status[]"
                    value="outofstock"
                    <?php checked(
                        in_array(
                            'outofstock',
                            $selected_stock,
                            true
                        )
                    ); ?>
                >

                Առկա չէ
            </label>

        </div>



        <!-- =================================================
             CATEGORY ATTRIBUTES
             
             Միայն category էջում ենք ցույց տալիս։
             Shop էջում այս հատվածը չի երևա։
        ================================================== -->

        <?php if ( is_product_category() && ! empty( $product_ids ) ) : ?>


            <?php foreach ( $attributes as $attribute ) : ?>


                <?php

                /*
                 * Օրինակ՝
                 *
                 * brand
                 * ↓
                 * pa_brand
                 */

                $taxonomy = wc_attribute_taxonomy_name(
                    $attribute->attribute_name
                );


                if ( ! taxonomy_exists( $taxonomy ) ) {
                    continue;
                }


                /*
                 * Վերցնում ենք միայն այն terms-ը,
                 * որոնք օգտագործված են CURRENT CATEGORY-ի
                 * ապրանքների վրա։
                 */

                $terms = wp_get_object_terms(
                    $product_ids,
                    $taxonomy,
                    array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                    )
                );


                /*
                 * Եթե այս category-ում տվյալ
                 * attribute-ը չի օգտագործվում,
                 * ընդհանրապես չենք ցուցադրում։
                 */

                if (
                    empty( $terms ) ||
                    is_wp_error( $terms )
                ) {
                    continue;
                }


                /*
                 * Օրինակ՝
                 *
                 * attribute slug = brand
                 *
                 * GET parameter =
                 * filter_brand[]
                 */

                $param = 'filter_' . $attribute->attribute_name;


                /*
                 * Արդեն ընտրված արժեքները
                 */

                $selected = isset( $_GET[ $param ] )
                    ? array_map(
                        'sanitize_text_field',
                        (array) wp_unslash(
                            $_GET[ $param ]
                        )
                    )
                    : array();

                ?>


                <div class="fg-filter-group">

                    <h3>
                        <?php
                        echo esc_html(
                            $attribute->attribute_label
                        );
                        ?>
                    </h3>


                    <?php foreach ( $terms as $term ) : ?>


                        <label>

                            <input
                                type="checkbox"

                                name="<?php
                                echo esc_attr( $param );
                                ?>[]"

                                value="<?php
                                echo esc_attr(
                                    $term->slug
                                );
                                ?>"

                                <?php
                                checked(
                                    in_array(
                                        $term->slug,
                                        $selected,
                                        true
                                    )
                                );
                                ?>
                            >

                            <?php
                            echo esc_html(
                                $term->name
                            );
                            ?>

                        </label>


                    <?php endforeach; ?>

                </div>


            <?php endforeach; ?>


        <?php endif; ?>



        <!-- =================================================
             PRICE
        ================================================== -->

        <div class="fg-filter-group">

            <h3>Գին</h3>

            <div class="fg-filter-price">


                <input
                    type="number"
                    name="min_price"
                    placeholder="Min"
                    min="0"

                    value="<?php

                    echo isset( $_GET['min_price'] )
                        ? esc_attr(
                            wc_clean(
                                wp_unslash(
                                    $_GET['min_price']
                                )
                            )
                        )
                        : '';

                    ?>"
                >


                <input
                    type="number"
                    name="max_price"
                    placeholder="Max"
                    min="0"

                    value="<?php

                    echo isset( $_GET['max_price'] )
                        ? esc_attr(
                            wc_clean(
                                wp_unslash(
                                    $_GET['max_price']
                                )
                            )
                        )
                        : '';

                    ?>"
                >


            </div>

        </div>



        <!-- =================================================
             KEEP SORTING
        ================================================== -->

        <?php if ( isset( $_GET['orderby'] ) ) : ?>

            <input
                type="hidden"
                name="orderby"

                value="<?php
                echo esc_attr(
                    wc_clean(
                        wp_unslash(
                            $_GET['orderby']
                        )
                    )
                );
                ?>"
            >

        <?php endif; ?>



        <!-- =================================================
             SUBMIT
        ================================================== -->

        <button
            type="submit"
            class="fg-filter-submit"
        >
            Ֆիլտրել
        </button>



        <!-- =================================================
             RESET URL
        ================================================== -->

        <?php

        if ( is_product_category() ) {

            $reset_url = get_term_link(
                get_queried_object()
            );

        } else {

            $reset_url = wc_get_page_permalink(
                'shop'
            );

        }


        if ( is_wp_error( $reset_url ) ) {

            $reset_url = wc_get_page_permalink(
                'shop'
            );

        }

        ?>


        <a
            href="<?php
            echo esc_url( $reset_url );
            ?>"
            class="fg-filter-reset"
        >
            Մաքրել
        </a>


    </form>

</aside>





