<?php
/*
Template Name: Contact Page
*/

get_header();
?>

<main class="contact-page">

    <section class="contact-hero">
        <div class="contact-container">
            <span class="contact-eyebrow">FULL GROUP</span>
            <h1>Կապ մեզ հետ</h1>
            <p>
                Հարցերի, պատվերների կամ տեխնիկական խորհրդատվության համար
                կապվեք մեզ հետ։
            </p>
        </div>
    </section>


    <section class="contact-section">
        <div class="contact-container">

            <div class="contact-grid">

                <!-- LEFT -->
                <div class="contact-info">

                    <div class="contact-info__head">
                        <span>Կոնտակտային տվյալներ</span>
                        <h2>Մենք հասանելի ենք ձեզ համար</h2>

                        <p>
                            Կարող եք զանգահարել, գրել էլ․ հասցեին կամ այցելել
                            մեր խանութ։
                        </p>
                    </div>


                    <div class="contact-info__items">

                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6A19.79 19.79 0 0 1 2.12 4.18 2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.12.9.33 1.78.62 2.63a2 2 0 0 1-.45 2.11L8 9.73a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.85.29 1.73.5 2.63.62A2 2 0 0 1 22 16.92z"/>
                                </svg>
                            </div>

                            <div>
                                <span>Հեռախոս</span>
                                <a href="tel:+37495045150">
                                    +374 095045150
                                </a>
                            </div>
                        </div>


                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                    <path d="m22 6-10 7L2 6"/>
                                </svg>
                            </div>

                            <div>
                                <span>Էլ․ հասցե</span>
                                <a href="mailto:fullgrouparm@gmail.com">
                                    fullgrouparm@gmail.com
                                </a>
                            </div>
                        </div>


                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <path d="M21 10c0 7-9 12-9 12S3 17 3 10a9 9 0 1 1 18 0z"/>
                                    <circle cx="12" cy="10" r="3"/>
                                </svg>
                            </div>

                            <div>
                                <span>Հասցե</span>
                                <p>Երևան, Հայաստան</p>
                            </div>
                        </div>


                        <div class="contact-info__item">
                            <div class="contact-info__icon">
                                <svg viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="M12 7v5l3 2"/>
                                </svg>
                            </div>

                            <div>
                                <span>Աշխատանքային ժամեր</span>
                                <p>Երկ - Շբ: 09:00 - 20:30</p>
                                <p>Կիր: 09:30 - 14:30</p>
                            </div>
                        </div>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="contact-form-box">

                    <span class="contact-form-box__label">
                        Գրեք մեզ
                    </span>

                    <h2>Ունե՞ք հարց</h2>

                    <p>
                        Լրացրեք ձևը, և մենք հնարավորինս շուտ կկապվենք ձեզ հետ։
                    </p>

                    <?php echo do_shortcode('[contact-form-7 id="04e2e8c" title="Contact form 1"]'); ?>

                </div>

            </div>

        </div>
    </section>


  <section class="contact-map">

    <iframe
        src="https://www.google.com/maps?q=Փարաքար+համայնք,+գյուղ+Բաղրամյան,+Իսահակյան+2011/03,+Արմավիր,+Հայաստան&output=embed"
        width="100%"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Full Group հասցե">
    </iframe>

</section>

</main>


<?php get_footer(); ?>