<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Full_group
 */

?>

<footer class="site-footer">

    <div class="footer-main">
        <div class="footer-container">

            <div class="footer-grid">

                <!-- Logo / About -->
                <div class="footer-col footer-brand">

                    <?php if ( has_custom_logo() ) : ?>
                        <div class="footer-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <h3 class="footer-logo-text">
                            FULL <span>GROUP</span>
                        </h3>
                    <?php endif; ?>

                    <p>
                        Կենցաղային և էլեկտրոնային տեխնիկայի լայն տեսականի՝
                        տան, խոհանոցի և առօրյա օգտագործման համար։
                    </p>

                        <div class="footer-socials">

    <!-- Instagram -->
    <a
        href="https://www.instagram.com/_full_group_?igsi=MW9mNWtpMjd5OGN3ZA=="
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Instagram"
    >
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2c1.66 0 3 1.34 3 3v10c0 1.66-1.34 3-3 3H7c-1.66 0-3-1.34-3-3V7c0-1.66 1.34-3 3-3h10zm.5 1.5a1.25 1.25 0 1 0 0 2.5 1.25 1.25 0 0 0 0-2.5zM12 7a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 2a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/>
        </svg>
    </a>


    <!-- Facebook -->
    <a
        href="https://www.facebook.com/share/19HbSt8avL/?mibextid=wwXIfr"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Facebook"
    >
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M22 12a10 10 0 1 0-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.2 2.23.2v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.77l-.44 2.89h-2.33v6.99A10 10 0 0 0 22 12z"/>
        </svg>
    </a>


    <!-- TikTok -->
    <a
        href="https://www.tiktok.com/@full.group?_r=1"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="TikTok"
    >
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 1 1-2-2.75V9.4a6.34 6.34 0 1 0 5.45 6.27V8.73a8.16 8.16 0 0 0 4.77 1.52V6.82c-.34 0-.67-.04-1-.13z"/>
        </svg>
    </a>

</div>

                </div>


                <!-- Categories -->
                <div class="footer-col">

                    <h4>Կատեգորիաներ</h4>

                    <ul>

                        <?php
                        $footer_categories = get_terms([
                            'taxonomy'   => 'product_cat',
                            'hide_empty' => false,
                            'parent'     => 0,
                            'number'     => 6,
                        ]);

                        if (!empty($footer_categories) && !is_wp_error($footer_categories)) :

                            foreach ($footer_categories as $category) :
                                ?>
                                <li>
                                    <a href="<?php echo esc_url(get_term_link($category)); ?>">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                </li>
                            <?php
                            endforeach;

                        endif;
                        ?>

                    </ul>

                </div>


                <!-- Navigation -->
                <div class="footer-col">

                    <h4>Օգտակար հղումներ</h4>
                   <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu',
                            'menu_class'     => 'primary-menu menu',
                        )
                    );
				    ?>

                </div>


                <!-- Contacts -->
                <div class="footer-col">

                    <h4>Կապ մեզ հետ</h4>

                    <ul class="footer-contact">

                        <li>
                            <span>Հեռ․</span>
                            <a href="tel:+37400000000">
                                +374 095045150
                            </a>
                        </li>

                        <li>
                            <span>Email</span>
                            <a href="mailto:fullgrouparm@gmail.com">
                                fullgrouparm@gmail.com
                            </a>
                        </li>

                        <li>
                            <span>Հասցե</span>
                            <p>Երևան, Հայաստան</p>
                        </li>

                        <li>
                            <span>Աշխատանքային ժամեր</span>
                            <p>Երկ - Շբ: 09::30 - 20:30</p>
                            <p>Կիր: 09::30 - 14:30</p>
                        </li>

                    </ul>

                </div>

            </div>

        </div>
    </div>


    <div class="footer-bottom">
        <div class="footer-container footer-bottom-inner">

            <p>
                © <?php echo date('Y'); ?> Full Group.
                Բոլոր իրավունքները պաշտպանված են։
            </p>

            <div class="footer-bottom-links">
                <a href="#">Գաղտնիության քաղաքականություն</a>
                <a href="#">Պայմաններ</a>
            </div>

        </div>
    </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>
</div>

<?php wp_footer(); ?>

</body>
</html>
