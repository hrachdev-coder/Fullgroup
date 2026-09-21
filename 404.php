<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Full_group
 */

get_header();
?>

<main class="error-404-page">
    <div class="error-404-container">

        <div class="error-404-code">404</div>

        <span class="error-404-label">Էջը չի գտնվել</span>

        <h1>Oops! Այս էջը գոյություն չունի</h1>

        <p>
            Հնարավոր է էջը տեղափոխվել է, ջնջվել է կամ հասցեն սխալ է մուտքագրված։
            Կարող եք վերադառնալ գլխավոր էջ կամ դիտել մեր ապրանքները։
        </p>

        <div class="error-404-actions">

            <a href="<?php echo esc_url(home_url('/')); ?>" class="error-404-btn error-404-btn--primary">
                Վերադառնալ գլխավոր էջ
            </a>

            <?php if (class_exists('WooCommerce')) : ?>
                <a href="<?php echo esc_url(wc_get_page_permalink('shop')); ?>" class="error-404-btn error-404-btn--secondary">
                    Տեսնել ապրանքները
                </a>
            <?php endif; ?>

        </div>

        <div class="error-404-search">

            <h3>Փնտրեք անհրաժեշտ ապրանքը</h3>

            <form
                role="search"
                method="get"
                class="error-search-form"
                action="<?php echo esc_url(home_url('/')); ?>"
            >

                <input
                    type="search"
                    name="s"
                    placeholder="Փնտրել ապրանք..."
                    value="<?php echo get_search_query(); ?>"
                >

                <input type="hidden" name="post_type" value="product">

                <button type="submit" aria-label="Փնտրել">
                    <svg
                        width="21"
                        height="21"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                </button>

            </form>

        </div>

    </div>
</main>

<?php
get_footer();
