<?php get_header(); ?>

<section class="products-section">
    <div class="products-container">

        <div class="categories">

            <button class="categories-mobile-toggle" type="button">
                <span>ԱՊՐԱՆՔԱՏԵՍԱԿՆԵՐ</span>
                <span class="categories-mobile-icon"></span>
            </button>

            <div class="categories-title">
                ԱՊՐԱՆՔԱՏԵՍԱԿՆԵՐ
            </div>

            <ul class="categories-list">

                <?php
                $categories = get_terms(array(
                    'taxonomy'   => 'product_cat',
                    'hide_empty' => false,
                    'parent'     => 0,
                    'orderby'    => 'menu_order',
                    'order'      => 'ASC',
                ));

                if (!empty($categories) && !is_wp_error($categories)) :

                    foreach ($categories as $category) :

                        $children = get_terms(array(
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                            'parent'     => $category->term_id,
                            'orderby'    => 'menu_order',
                            'order'      => 'ASC',
                        ));

                        $has_children = !empty($children) && !is_wp_error($children);
                        ?>

                        <li class="category-item">

                            <div class="category-row">

                                <?php if ($has_children) : ?>

                                    <span class="category-title">
                                        <?php echo esc_html($category->name); ?>
                                    </span>

                                <?php else : ?>

                                    <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </a>

                                <?php endif; ?>


                                <?php if ($has_children) : ?>

                                    <button
                                        class="category-arrow"
                                        type="button"
                                        aria-label="Բացել ենթակատեգորիաները"
                                    >
                                        <span></span>
                                    </button>

                                <?php endif; ?>

                            </div>


                            <?php if ($has_children) : ?>

                                <ul class="subcategory-list">

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


      <div class="banner-slider swiper">

    <?php if ( have_rows('slides') ) : ?>

        <div class="swiper-wrapper">

            <?php while ( have_rows('slides') ) : the_row();

                $image = get_sub_field('slider_image');
                $caption = get_sub_field('caption');
            ?>

                <div class="swiper-slide">

                    <?php if ( $image ) : ?>
                        <img
                            src="<?php echo esc_url($image); ?>"
                            alt=""
                            class="banner-slider__image"
                        >
                    <?php endif; ?>

                    <?php if ( $caption ) : ?>
                        <p class="banner-slider__caption">
                            <?php echo esc_html($caption); ?>
                        </p>
                    <?php endif; ?>

                </div>

            <?php endwhile; ?>

        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

    <?php endif; ?>

</div>

    </div>
</section>




<section class="popular-categories">
    <div class="container">

        <div class="tech-section-title">
            <span class="title-line"></span>

            <h2>Ինչ կարող է հետաքրքրել</h2>

            <span class="title-line"></span>
        </div>
        <div class="category-grid">

            <?php
            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'parent'     => 0,
                'number'     => 5,
                'exclude'    => [get_option('default_product_cat')],
            ]);

            if (!empty($categories) && !is_wp_error($categories)) :

                foreach ($categories as $category) :

                    $thumbnail_id = get_term_meta(
                        $category->term_id,
                        'thumbnail_id',
                        true
                    );

                    $image = $thumbnail_id
                        ? wp_get_attachment_image_url($thumbnail_id, 'large')
                        : wc_placeholder_img_src();

                    $category_link = get_term_link($category);
            ?>

                <a
                    href="<?php echo esc_url($category_link); ?>"
                    class="category-card"
                >

                    <div class="category-card__image">
                        <img
                            src="<?php echo esc_url($image); ?>"
                            alt="<?php echo esc_attr($category->name); ?>"
                        >
                    </div>

                    <div class="category-card__content">

                        <h3>
                            <?php echo esc_html($category->name); ?>
                        </h3>

                        <p>
                            <?php echo intval($category->count); ?>
                            ապրանք
                        </p>

                        <span class="category-card__button">
                            Դիտել կատեգորիան
                            <svg
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                            >
                                <path
                                    d="M5 12H19M13 6L19 12L13 18"
                                    stroke="currentColor"
                                    stroke-width="1.7"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </span>

                    </div>

                </a>

            <?php
                endforeach;
            endif;
            ?>

        </div>

    </div>
</section>




<section class="tech-categories">

    <div class="tech-container">

        <div class="tech-section-title">
            <span class="title-line"></span>

            <h2>Կենցաղային տեխնիկա</h2>

            <span class="title-line"></span>
        </div>


        <div class="tech-category-grid">

            <?php

            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => false,
                'parent'     => 0,
                'number'     => 4,
                'orderby'    => 'menu_order',
                'order'      => 'ASC',
            ]);

            if (!empty($categories) && !is_wp_error($categories)) :

                foreach ($categories as $category) :

                    // Category image
                    $thumbnail_id = get_term_meta(
                        $category->term_id,
                        'thumbnail_id',
                        true
                    );

                    $image = $thumbnail_id
                        ? wp_get_attachment_image_url($thumbnail_id, 'medium')
                        : wc_placeholder_img_src();


                    // Child categories
                    $children = get_terms([
                        'taxonomy'   => 'product_cat',
                        'hide_empty' => false,
                        'parent'     => $category->term_id,
                        'number'     => 3,
                    ]);

                    $category_link = get_term_link($category);

            ?>

                <a
                    href="<?php echo esc_url($category_link); ?>"
                    class="tech-category-card"
                >

                    <div class="tech-category-image">

                        <img
                            src="<?php echo esc_url($image); ?>"
                            alt="<?php echo esc_attr($category->name); ?>"
                        >

                    </div>


                    <div class="tech-category-content">

                        <h3>
                            <?php echo esc_html($category->name); ?>
                        </h3>


                        <?php if (!empty($children) && !is_wp_error($children)) : ?>

                            <div class="tech-subcategories">

                                <?php

                                $child_names = [];

                                foreach ($children as $child) {
                                    $child_names[] = $child->name;
                                }

                                echo esc_html(
                                    implode(' · ', $child_names)
                                );

                                ?>

                            </div>

                        <?php else : ?>

                            <div class="tech-subcategories">
                                Դիտել ապրանքները
                            </div>

                        <?php endif; ?>

                    </div>


                    <span class="tech-card-arrow">

                        <svg
                            width="20"
                            height="20"
                            viewBox="0 0 24 24"
                            fill="none"
                        >
                            <path
                                d="M5 12H19M13 6L19 12L13 18"
                                stroke="currentColor"
                                stroke-width="1.7"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>

                    </span>

                </a>

            <?php

                endforeach;

            endif;

            ?>

        </div>

    </div>

</section>









<?php
$category = get_term_by('name', 'հեռուստացույցներ', 'product_cat');

if ($category && !is_wp_error($category)) :

    $products = new WP_Query([
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'DESC',

        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ],
        ],
    ]);

    if ($products->have_posts()) :
?>

<section class="category-products">

    <div class="category-products__head">

        <h2 class="category-products__title">
            <?php echo esc_html($category->name); ?>
        </h2>

        <a
            href="<?php echo esc_url(get_term_link($category)); ?>"
            class="category-products__all"
        >
            Տեսնել բոլորը →
        </a>

    </div>


    <div class="category-products__grid">

        <?php
        while ($products->have_posts()) :
            $products->the_post();

            $product = wc_get_product(get_the_ID());

            if (!$product) {
                continue;
            }
        ?>

            <article class="product-card">

                <!-- IMAGE -->
                <a
                    href="<?php the_permalink(); ?>"
                    class="product-card__image"
                >

                    <?php
                    if (has_post_thumbnail()) {

                        the_post_thumbnail(
                            'woocommerce_thumbnail',
                            [
                                'loading' => 'lazy',
                            ]
                        );

                    } else {

                        echo wc_placeholder_img(
                            'woocommerce_thumbnail'
                        );

                    }
                    ?>

                </a>


                <!-- CONTENT -->
                <div class="product-card__content">

                    <h3 class="product-card__title">

                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>

                    </h3>


                    <?php if ($product->get_price_html()) : ?>

                        <div class="product-card__price">

                            <?php
                            echo wp_kses_post(
                                $product->get_price_html()
                            );
                            ?>

                        </div>

                    <?php endif; ?>


                    <a
                        href="<?php the_permalink(); ?>"
                        class="product-card__button"
                    >
                        Տեսնել ապրանքը
                    </a>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php
    endif;

    wp_reset_postdata();

endif;
?>







<?php
$category = get_term_by(
    'slug',
    'լվացքի-մեքենաներ-և-չորանոցներ',
    'product_cat'
);

if ($category && !is_wp_error($category)) :

    $products = new WP_Query([
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 4,
        'orderby'        => 'date',
        'order'          => 'DESC',

        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ],
        ],
    ]);

    if ($products->have_posts()) :
?>

<section class="category-products">

    <div class="category-products__head">

        <h2 class="category-products__title">
            <?php echo esc_html($category->name); ?>
        </h2>

        <a
            href="<?php echo esc_url(get_term_link($category)); ?>"
            class="category-products__all"
        >
            Տեսնել բոլորը →
        </a>

    </div>

    <div class="category-products__grid">

        <?php
        while ($products->have_posts()) :
            $products->the_post();

            $product = wc_get_product(get_the_ID());

            if (!$product) {
                continue;
            }
        ?>

            <article class="product-card">

                <a
                    href="<?php the_permalink(); ?>"
                    class="product-card__image"
                >

                    <?php
                    if (has_post_thumbnail()) {

                        the_post_thumbnail(
                            'woocommerce_thumbnail',
                            [
                                'loading' => 'lazy',
                            ]
                        );

                    } else {

                        echo wc_placeholder_img(
                            'woocommerce_thumbnail'
                        );

                    }
                    ?>

                </a>

                <div class="product-card__content">

                    <h3 class="product-card__title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <?php if ($product->get_price_html()) : ?>

                        <div class="product-card__price">
                            <?php
                            echo wp_kses_post(
                                $product->get_price_html()
                            );
                            ?>
                        </div>

                    <?php endif; ?>

                    <a
                        href="<?php the_permalink(); ?>"
                        class="product-card__button"
                    >
                        Տեսնել ապրանքը
                    </a>

                </div>

            </article>

        <?php endwhile; ?>

    </div>

</section>

<?php
    endif;

    wp_reset_postdata();

endif;
?>



<?php get_footer(); ?>