<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Full_group
 */

get_header();
?>

<?php
/**
 * Search Results
 *
 * @package Full_group
 */

get_header();
?>

<main class="search-page">
    <div class="search-page__container">

        <div class="search-page__head">
            <h1 class="search-page__title">
                Որոնման արդյունքներ՝
                <span><?php echo esc_html(get_search_query()); ?></span>
            </h1>
        </div>

        <?php if (have_posts()) : ?>

            <div class="search-products-grid">

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    if (get_post_type() !== 'product') {
                        continue;
                    }

                    $product = wc_get_product(get_the_ID());

                    if (!$product) {
                        continue;
                    }
                    ?>

                    <article class="search-product-card">

                        <a
                            href="<?php the_permalink(); ?>"
                            class="search-product-card__image"
                        >
                            <?php
                            if (has_post_thumbnail()) {
                                the_post_thumbnail('woocommerce_thumbnail');
                            } else {
                                echo wc_placeholder_img('woocommerce_thumbnail');
                            }
                            ?>
                        </a>

                        <div class="search-product-card__content">

                            <h2 class="search-product-card__title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <?php if ($product->get_price_html()) : ?>
                                <div class="search-product-card__price">
                                    <?php echo wp_kses_post($product->get_price_html()); ?>
                                </div>
                            <?php endif; ?>

                            <a
                                href="<?php the_permalink(); ?>"
                                class="search-product-card__link"
                            >
                                Տեսնել ավելին
                            </a>

                        </div>

                    </article>

                <?php endwhile; ?>

            </div>

            <div class="search-pagination">
                <?php
                the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => '←',
                    'next_text' => '→',
                ]);
                ?>
            </div>

        <?php else : ?>

            <div class="search-empty">
                <h2>Ապրանք չի գտնվել</h2>
                <p>Փորձեք այլ բառով որոնել։</p>
            </div>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>
get_footer();
