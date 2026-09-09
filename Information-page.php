<?php
/*
Template Name: Information Page
*/

get_header();
?>

<main class="info-page">

    <section class="info-hero">
        <div class="info-container">
            <span class="info-label">FULL GROUP</span>
            <h1>Օգտակար տեղեկատվություն</h1>
            <p>
                Այստեղ կարող եք ծանոթանալ առաքման, երաշխիքի,
                ապառիկի և վճարման պայմաններին։
            </p>
        </div>
    </section>


    <section class="info-content">
        <div class="info-container">

            <div class="info-layout">

                <aside class="info-sidebar">
                    <a href="#delivery">Առաքում</a>
                    <a href="#warranty">Երաշխիք</a>
                    <a href="#credit">Ապառիկ</a>
                    <a href="#payment">Վճարման պայմաններ</a>
                </aside>


                <div class="info-sections">

                    <section class="info-card" id="delivery">
                        <span class="info-card__number">01</span>

                        <h2>Առաքում</h2>

                        <p>
                            FULL GROUP-ը իրականացնում է ապրանքների առաքում
                            նախապես համաձայնեցված պայմաններով։
                        </p>

                        <p>
                            Առաքման ժամկետը և արժեքը կարող են կախված լինել
                            պատվերի տեսակից, ապրանքի չափերից և առաքման հասցեից։
                        </p>

                        <p>
                            Մանրամասների համար խնդրում ենք կապվել մեզ հետ։
                        </p>

                        <a href="tel:+37400000000" class="info-call-btn">
                            Զանգահարել
                        </a>
                    </section>


                    <section class="info-card" id="warranty">
                        <span class="info-card__number">02</span>

                        <h2>Երաշխիք</h2>

                        <p>
                            Երաշխիքային պայմանները կախված են տվյալ ապրանքի
                            արտադրողից և ապրանքատեսակից։
                        </p>

                        <p>
                            Երաշխիքային սպասարկման համար անհրաժեշտ է պահպանել
                            գնման փաստաթուղթը և երաշխիքային կտրոնը։
                        </p>

                        <p>
                            Երաշխիքի կոնկրետ ժամկետը կարող եք ճշտել
                            տվյալ ապրանքի վերաբերյալ մեզ հետ կապ հաստատելով։
                        </p>
                    </section>


                    <section class="info-card" id="credit">
                        <span class="info-card__number">03</span>

                        <h2>Ապառիկ</h2>

                        <p>
                            Որոշ ապրանքներ հնարավոր է ձեռք բերել ապառիկ
                            վճարման տարբերակով։
                        </p>

                        <p>
                            Ապառիկի պայմանները, ժամկետները և հաստատման
                            գործընթացը կախված են համապատասխան ֆինանսական
                            կազմակերպության կամ բանկի պայմաններից։
                        </p>

                        <p>
                            Ապառիկի հասանելիությունը ճշտելու համար կապվեք
                            մեր աշխատակիցների հետ։
                        </p>
                    </section>


                    <section class="info-card" id="payment">
                        <span class="info-card__number">04</span>

                        <h2>Վճարման պայմաններ</h2>

                        <p>
                            Վճարման հասանելի եղանակները կարող են ներառել
                            կանխիկ և անկանխիկ վճարման տարբերակներ։
                        </p>

                        <p>
                            Վճարման կոնկրետ պայմանները համաձայնեցվում են
                            գնումը ձևակերպելու ժամանակ։
                        </p>

                        <p>
                            Լրացուցիչ տեղեկությունների համար կարող եք
                            զանգահարել կամ գրել մեզ։
                        </p>

                        <a
                            href="<?php echo esc_url(home_url('/contact/')); ?>"
                            class="info-contact-btn"
                        >
                            Կապ մեզ հետ
                        </a>
                    </section>

                </div>

            </div>

        </div>
    </section>

</main>

<?php get_footer(); ?>