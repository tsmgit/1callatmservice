<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blog
 */

get_header();
?>

<div class="main__body__wrapp">
	<div class="header__banner__main header__banner__inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg static-top">
				<div class="container main__header__content">
					<button class="navbar-toggler navbar-toggler-right hamburger-menu order-2" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
						<span class="bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<div class="mobile__responsive__logo d-xl-none d-lg-block d-md-block d-sm-block pl-3 pr-3 pt-3 pb-3">
							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo.png" alt="" class="" />
						</div>
						<ul class="navbar-nav">
							<li>
								<a href="https://1callatmservice.com">Home</a>
							</li>
							<li>
								<a href="https://1callatmservice.com/about-us">About Us </a>
							</li>
							<li>
								<a href="https://1callatmservice.com/products">Products </a>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Service </a>
								<ul class="dropdown-menu">
									<li><a href="https://1callatmservice.com/service-details/flat-rate-atm-repair-services">Flat Rate ATM Repair Services</a></li>
									<li><a href="https://1callatmservice.com/service-details/field-service">Field Service</a></li>
								</ul>
							</li>
							<li>
								<a href="https://1callatmservice.com/blogs">Blogs</a>
							</li>
							<li>
								<a href="https://1callatmservice.com/contact-us">Contact Us</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="banner__content">
			<div class="banner__content__inner">
				<h1>our blogs</h1>
			</div>
		</div>
	</div>
	<div class="contact__holder">
		<div class="container">
			<div class="row">
				<?php while (have_posts()) {
					the_post(); ?>
					<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
						<div class="bg__one box-shadow">
							<div class="image__box">
								<a href="<?php echo the_permalink() ?>">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100" />
								</a>
							</div>
							<div class="blog__text">
								<a href="<?php echo the_permalink() ?>">
									<h3><?php echo the_title() ?></h3>
								</a>
								<p>
									<?php echo the_excerpt() ?>
								</p>
								<a href="<?php echo the_permalink() ?>">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/round.png" alt="" />
								</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
