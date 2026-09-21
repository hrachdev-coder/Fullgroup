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
                  FULL GROUP-ը ներկայացնում է էլեկտրոնիկայի, կենցաղային տեխնիկայի և տան համար նախատեսված ապրանքների լայն տեսականի՝ միավորելով բարձր որակը, ժամանակակից տեխնոլոգիաները և հարմարավետությունը:
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
                    <div class="about-image-placeholder" style="background-image: url('<?php the_field('about_image') ?>');">
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

                    <h3>Երաշխավորված որակ</h3>

                    <p>
                        Միայն ստուգված և հուսալի տեխնիկա՝ Ձեր տան ու աշխատանքի հարմարավետության համար։
                    </p>
                </article>

                <article class="about-value-card">
                    <div class="about-value-card__number">02</div>

                    <h3>Անհատական մոտեցում  </h3>

                    <p>
                       Մեր մասնագետները կօգնեն Ձեզ գտնել Ձեր պահանջներին ու բյուջեին լավագույնս համապատասխանող լուծումը։
                    </p>
                </article>

                <article class="about-value-card">
                    <div class="about-value-card__number">03</div>

                    <h3>Վստահելի գործընկեր</h3>

                    <p>
                       Կառուցում ենք երկարատև հարաբերություններ՝ հիմնված որակի, ազնվության և անթերի սպասարկման վրա։
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

                    <!-- <h2>
                        Ապրանքի ընտրությունը դարձնել
                        ավելի պարզ և հարմար
                    </h2> -->

                    <p>
                      Գնումների գործընթացը դարձնել պարզ, արագ և հարմարավետ
Մենք ստեղծում ենք ժամանակակից միջավայր, որտեղ դուք կարող եք հեշտությամբ ուսումնասիրել տեսականին, համեմատել տարբերակները և ստանալ մասնագիտական ճշգրիտ խորհրդատվություն՝ լավագույն ընտրությունը կատարելու համար։
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