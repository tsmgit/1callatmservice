<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">Catalogue </a>
							</li>
							<li>
								<a href="product.html">Services </a>
							</li>
							<li>
								<a href="blog.html">About </a>
							</li>
							<li>
								<a href="contact.html">Contact</a>
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
	<div class="blog__wrappone">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
					<div class="blog__details__img">
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="w-100" />
					</div>
					<h3><?php the_title() ?></h3>
					<?php the_content() ?>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
					<div class="recentposts">

						<?php
						$args = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => 8,
							'order_by'  => 'date',
							'order' => 'DESC',
						);

						$loop = new WP_Query($args);
						?>
						<?php while ($loop->have_posts()) : $loop->the_post(); ?>
							<div class="repost__wrapp">
								<div class="repost__image">
									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
								</div>
								<div class="repost__text">
									<a href="<?php echo the_permalink() ?>"><?php echo the_title() ?></a>
									<p class="lorem"><?php echo the_excerpt() ?></p>
								</div>
							</div>
						<?php
						endwhile;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
