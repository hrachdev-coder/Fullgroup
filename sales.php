<?php
/**
 * Template Name: Sales Products
 */

defined('ABSPATH') || exit;

get_header();
?>

<main class="sales-page">

    <div class="sales-container">

        <div class="sales-header">
            <h1>ԱԿՑԻԱՆԵՐ</h1>
            <p>Զեղչված ապրանքներ</p>
        </div>

        <?php
        $sale_products = wc_get_products([
            'status'   => 'publish',
            'limit'    => -1,
            'on_sale'  => true,
            'orderby'  => 'date',
            'order'    => 'DESC',
        ]);
        ?>

        <?php if (!empty($sale_products)) : ?>

            <div class="sales-products-grid">

                <?php foreach ($sale_products as $product) : ?>

                    <?php
                    if (!$product->is_visible()) {
                        continue;
                    }
                    ?>

                    <article class="sales-product-card">

                        <a
                            href="<?php echo esc_url($product->get_permalink()); ?>"
                            class="sales-product-image"
                        >

                            <?php if ($product->is_on_sale()) : ?>
                                <span class="sales-badge">ԶԵՂՉ</span>
                            <?php endif; ?>

                            <?php
                            echo $product->get_image('woocommerce_thumbnail');
                            ?>

                        </a>

                        <div class="sales-product-content">

                            <h2 class="sales-product-title">
                                <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                    <?php echo esc_html($product->get_name()); ?>
                                </a>
                            </h2>

                            <div class="sales-product-price">
                                <?php echo wp_kses_post($product->get_price_html()); ?>
                            </div>

                        </div>

                    </article>

                <?php endforeach; ?>

            </div>

        <?php else : ?>

            <div class="sales-empty">
                <div class="sales-empty-icon">%</div>

                <h2>Այս պահին զեղչված ապրանքներ չկան</h2>

                <p>
                    Շուտով այստեղ կհայտնվեն նոր ակցիաներ։
                </p>
            </div>

        <?php endif; ?>

    </div>

</main>

<?php get_footer(); ?>