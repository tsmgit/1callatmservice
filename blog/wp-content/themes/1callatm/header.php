<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link href="<?php echo get_stylesheet_directory_uri() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/custom-style.css" rel="stylesheet" />
	<link href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/responsive.css" rel="stylesheet" />
	<link href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/owl.css" rel="stylesheet" />

	<?php wp_head(); ?>
</head>

<header>
	<div class="header__top">
		<div class="container">
			<a class="" href="#">
				<div class="logo__holder">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="" class="header__logo" />
				</div>
			</a>
			<div class="header__content__inner">
				<div class="contact__info__outer">
					<div class="contact__info email__wrapp">
						<a href="+16629322490">
							<i class="fa-solid fa-phone"></i>
							<span>+1 6629322490</span>
						</a>
						<a href="+19018711917">
							<i class="fa-solid fa-phone"></i>
							<span>+1 9018711917</span>
						</a>
					</div>
					<div class="contact__info phone__wrapp">
						<a href="mailto:freddie.williams@1callatmservice.com" class="email__wrapp" style="color: rgb(0, 0, 0); font-size: 19px; font-weight: 400; margin-right: 8px; --darkreader-inline-color: #e8e6e3;" data-darkreader-inline-color="">
							<i class="fa-solid fa-envelope" style="color: rgb(199, 0, 0); --darkreader-inline-color: #ff4141;" data-darkreader-inline-color=""></i>
							<span>freddie.williams@1callatmservice.com</span>
						</a>
						<div class="socialicon__header">
							<ul>
								<li>
									<a href="https://www.facebook.com/profile.php?id=100093011503608&amp;mibextid=ZbWKwL" class="">
										<i class="fa-brands fa-facebook-f"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>