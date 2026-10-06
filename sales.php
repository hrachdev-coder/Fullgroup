<?php
/**
 * Template Name: Sales Products
 */

get_header();
?>

<main class="sales-page">

    <div class="container">

        <div class="sales-page__header">
            <h1>ԱԿՑԻԱՆԵՐ</h1>
        </div>

        <?php
        $sale_products = new WP_Query([
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'meta_query'     => [
                [
                    'key'     => '_sale_price',
                    'value'   => '',
                    'compare' => '!=',
                ],
            ],
        ]);
        ?>

        <?php if ($sale_products->have_posts()) : ?>

            <div class="products-grid">

                <?php while ($sale_products->have_posts()) : $sale_products->the_post(); ?>

                    <?php
                    global $product;

                    if (!$product || !$product->is_visible()) {
                        continue;
                    }
                    ?>

                    <div class="product-card">

                        <a href="<?php the_permalink(); ?>" class="product-card__image">

                            <?php if ($product->is_on_sale()) : ?>
                                <span class="product-card__sale">
                                    ԶԵՂՉ
                                </span>
                            <?php endif; ?>

                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('woocommerce_thumbnail');
                            } else {
                                echo wc_placeholder_img('woocommerce_thumbnail');
                            }
                            ?>

                        </a>

                        <div class="product-card__content">

                            <h2 class="product-card__title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="product-card__price">
                                <?php echo $product->get_price_html(); ?>
                            </div>

                            <a href="<?php the_permalink(); ?>" class="product-card__button">
                                Դիտել ապրանքը
                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        <?php else : ?>

            <div class="sales-empty">
                <h2>Այս պահին զեղչված ապրանքներ չկան</h2>
                <p>Շուտով այստեղ կհայտնվեն նոր ակցիաներ։</p>
            </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

</main>

<?php get_footer(); ?>