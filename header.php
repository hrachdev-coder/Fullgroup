<?php
/**
 * The header for our theme
 *
 * @package Full_group
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<header class="header">

		<div class="header-container">

			<div class="header-logo">

				<?php
				the_custom_logo();

				if (is_front_page() && is_home()) :
				?>
					<h1 class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<?php bloginfo('name'); ?>
						</a>
					</h1>
				<?php
				else :
				?>
					<p class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
							<?php bloginfo('name'); ?>
						</a>
					</p>
				<?php
				endif;
				?>

			</div>


			<!-- DESKTOP MENU -->
			<nav class="main-navigation">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'primary-menu menu',
					)
				);
				?>

			</nav>


			<!-- DESKTOP ACTIONS -->
			<div class="header-actions">

				<a href="tel:+37495045150" class="phone">
					հեռ: +374 095 04 51 50
				</a>

				<a
					href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
					class="contact-button"
				>
					Կապնվել մեզ հետ
				</a>

			</div>


			<!-- MOBILE TOGGLE -->
			<button
				class="menu-toggle"
				type="button"
				aria-label="Բացել մենյուն"
				aria-expanded="false"
			>

				<svg
					xmlns="http://www.w3.org/2000/svg"
					width="24"
					height="24"
					fill="currentColor"
					viewBox="0 0 16 16"
				>
					<path
						fill-rule="evenodd"
						d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"
					/>
				</svg>

			</button>

		</div>


		<!-- SECONDARY NAV -->
	<nav class="secondary-nav">

	<div class="secondary-nav__container">

		<a
			href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
			class="secondary-nav__item"
		>
			Հետադարձ Կապ
		</a>


		<a
			href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>"
			class="secondary-nav__item"
		>
			Մեր Մասին
		</a>


		<div class="secondary-nav__dropdown">

			<button
				class="secondary-nav__item secondary-nav__dropdown-toggle"
				type="button"
			>
				Տեսնել ավելին

				<span class="secondary-nav__chevron"></span>
			</button>

			<div class="secondary-nav__dropdown-menu">

				<a href="<?php echo esc_url(get_permalink(get_page_by_path('information-page'))); ?>">
					Վճարման պայմաններ
				</a>

			</div>

		</div>


		<!-- SEARCH -->
		<div class="secondary-nav__search">

			<form
				role="search"
				method="get"
				class="secondary-search-form"
				action="<?php echo esc_url(home_url('/')); ?>"
			>

				<input
					type="search"
					class="secondary-search-input"
					placeholder="Փնտրել ապրանք..."
					value="<?php echo get_search_query(); ?>"
					name="s"
					autocomplete="off"
				>

				<input
					type="hidden"
					name="post_type"
					value="product"
				>

				<button
					type="submit"
					class="secondary-search-button"
					aria-label="Փնտրել"
				>
					<svg
						xmlns="http://www.w3.org/2000/svg"
						width="18"
						height="18"
						viewBox="0 0 16 16"
						fill="currentColor"
					>
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.867-3.834zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				</button>

			</form>

		</div>

	</div>

</nav>


		<!-- MOBILE MENU OVERLAY -->
		<div class="mobile-menu-overlay"></div>


		<!-- MOBILE MENU -->
		<div class="mobile-menu">

			<div class="mobile-menu__header">

		
				<button
					class="mobile-menu__close"
					type="button"
					aria-label="Փակել մենյուն"
				>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
  						<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
					</svg>
				</button>

			</div>


			<div class="mobile-menu__inner">


				<!-- WORDPRESS MAIN MENU -->
				<nav class="mobile-menu__navigation">

					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_class'     => 'mobile-menu__list',
							'container'      => false,
						)
					);
					?>

				</nav>


				<!-- SECONDARY LINKS -->
				<div class="mobile-menu__secondary">

					<?php
					if (!empty($categories) && !is_wp_error($categories)) :

						$category = $categories[0];
						$category_link = get_term_link($category);

						if (!is_wp_error($category_link)) :
					?>

						<a
							href="<?php echo esc_url($category_link); ?>"
							class="mobile-menu__category"
						>
							<?php echo esc_html($category->name); ?>
						</a>

					<?php
						endif;
					endif;
					?>


					<a href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>">
						Հետադարձ Կապ
					</a>


					<a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>">
						Մեր Մասին
					</a>


					<a href="<?php echo esc_url(get_permalink(get_page_by_path('information-page'))); ?>">
						Վճարման պայմաններ
					</a>

				</div>
				<!-- MOBILE CONTACTS -->
				<div class="mobile-menu__actions">

					<a
						href="tel:+37495045150"
						class="mobile-menu__phone"
					>
						հեռ: +374 095 04 51 50
					</a>

					<a
						href="<?php echo esc_url(get_permalink(get_page_by_path('contact-us'))); ?>"
						class="contact-button"
					>
						Կապնվել մեզ հետ
					</a>

				</div>

			</div>

		</div>

	</header>

