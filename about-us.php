<?php
/*
Template Name: About Us 
*/

get_header();
?>

<main class="about-page">

    <section class="about-hero">
        <div class="about-container">
            <div class="about-hero__content">

                <span class="about-eyebrow">FULL GROUP</span>

                <h1>Մեր մասին</h1>

                <p>
                    FULL GROUP-ը ներկայացնում է էլեկտրատեխնիկայի,
                    կենցաղային տեխնիկայի և տան համար նախատեսված
                    ապրանքների լայն տեսականի։
                </p>

            </div>
        </div>
    </section>


    <section class="about-intro">
        <div class="about-container">

            <div class="about-intro__grid">

                <div class="about-intro__content">
                    <span class="about-section-label">Մեր ընկերությունը</span>

                    <h2>
                        Որակյալ ապրանքներ՝
                        ձեր տան համար
                    </h2>

                    <p>
                        Մեր նպատակն է հաճախորդներին առաջարկել վստահելի,
                        որակյալ և գործնական լուծումներ տան ու առօրյայի համար։
                    </p>

                    <p>
                        Մենք կարևորում ենք ոչ միայն ապրանքի ընտրությունը,
                        այլ նաև սպասարկման որակը, խորհրդատվությունը և
                        հաճախորդի հետ երկարաժամկետ վստահելի հարաբերությունները։
                    </p>
                </div>

                <div class="about-intro__visual">
                    <div class="about-image-placeholder">
                        <span>FULL GROUP</span>
                    </div>
                </div>

            </div>

        </div>
    </section>


    <section class="about-values">
        <div class="about-container">

            <div class="about-section-heading">
                <span class="about-section-label">Մեր առավելությունները</span>
                <h2>Ինչու ընտրել մեզ</h2>
            </div>

            <div class="about-values__grid">

                <article class="about-value-card">
                    <div class="about-value-card__number">01</div>

                    <h3>Որակյալ տեսականի</h3>

                    <p>
                        Ընտրում ենք ապրանքներ, որոնք համապատասխանում են
                        մեր հաճախորդների պահանջներին և առօրյա կարիքներին։
                    </p>
                </article>

                <article class="about-value-card">
                    <div class="about-value-card__number">02</div>

                    <h3>Մասնագիտական սպասարկում</h3>

                    <p>
                        Օգնում ենք ճիշտ ընտրություն կատարել և տրամադրում
                        անհրաժեշտ տեղեկատվություն ապրանքների վերաբերյալ։
                    </p>
                </article>

                <article class="about-value-card">
                    <div class="about-value-card__number">03</div>

                    <h3>Վստահելի համագործակցություն</h3>

                    <p>
                        Մեզ համար կարևոր է յուրաքանչյուր հաճախորդի
                        վստահությունը և երկարաժամկետ համագործակցությունը։
                    </p>
                </article>

            </div>

        </div>
    </section>


    <section class="about-numbers">
        <div class="about-container">

            <div class="about-numbers__grid">

                <div class="about-number-item">
                    <strong>100+</strong>
                    <span>Ապրանքատեսակ</span>
                </div>

                <div class="about-number-item">
                    <strong>24/7</strong>
                    <span>Տեղեկատվություն կայքում</span>
                </div>

                <div class="about-number-item">
                    <strong>100%</strong>
                    <span>Հաճախորդակենտրոն մոտեցում</span>
                </div>

                <div class="about-number-item">
                    <strong>FULL</strong>
                    <span>Լուծումներ տան համար</span>
                </div>

            </div>

        </div>
    </section>


    <section class="about-mission">
        <div class="about-container">

            <div class="about-mission__box">

                <div class="about-mission__content">
                    <span class="about-section-label">Մեր նպատակը</span>

                    <h2>
                        Ապրանքի ընտրությունը դարձնել
                        ավելի պարզ և հարմար
                    </h2>

                    <p>
                        Մենք ցանկանում ենք ստեղծել միջավայր, որտեղ հաճախորդը
                        կարող է հեշտությամբ ծանոթանալ ապրանքներին,
                        համեմատել տարբերակները և ստանալ անհրաժեշտ խորհրդատվություն։
                    </p>
                </div>

                <a
                    href="<?php echo esc_url(home_url('/contact/')); ?>"
                    class="about-contact-btn"
                >
                    Կապ մեզ հետ
                </a>

            </div>

        </div>
    </section>


</main>

<?php get_footer(); ?>