    <footer class="footer__wrapp">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12 col-md-12 col-lg-12 col-xl-8 m-auto">
    				<div class="footer__nav">
    					<ul>
    						<li><a href="#">Home</a></li>
    						<li><a href="#">Services</a></li>
    						<li><a href="#">Support</a></li>
    						<li><a href="#">About</a></li>
    						<li><a href="#">Contact</a></li>
    					</ul>
    				</div>
    			</div>
    			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-10 m-auto">
    				<div class="row">
    					<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
    						<div class="box__wrapp">
    							<div class="mail__holder">
    								<i class="fa-solid fa-envelope"></i>
    							</div>
    							<a href="#">freddie.williams@1callatmservice.com</a>
    						</div>
    					</div>
    					<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
    						<div class="subscribe">
    							<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/footerlogo.png" alt="" class="m-auto d-block" />
    							<div class="subs__search">
    								<input type="text" name="" id="" placeholder="Enter your email to get updates" />
    								<input type="submit" value="Submit" class="ml-auto" />
    							</div>
    							<div class="socialicon__header">
    								<ul class="text-center mt-4">
    									<li>
    										<a href="#" class="">
    											<i class="fa-brands fa-facebook-f"></i>
    										</a>
    									</li>
    									<li>
    										<a href="#">
    											<i class="fa-brands fa-twitter"></i>
    										</a>
    									</li>
    									<li>
    										<a href="#">
    											<i class="fa-brands fa-instagram"></i>
    										</a>
    									</li>
    									<li>
    										<a href="#">
    											<i class="fa-brands fa-youtube"></i>
    										</a>
    									</li>
    								</ul>
    							</div>
    						</div>
    					</div>
    					<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
    						<div class="box__wrapp">
    							<div class="mail__holder">
    								<i class="fa-solid fa-phone"></i>
    							</div>
    							<a href="#">+1 6629322490</a>
    							<a href="#">+1 9018711917</a>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="copyright__wrapp">
    				<p>© 2023 1CALL ATM SERVICE . All Rights Reserved</p>
    			</div>
    		</div>
    	</div>
    </footer>

    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/vendor/jquery/jquery.slim.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/2d537fef4a.js" crossorigin="anonymous"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/core.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/owl.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/script.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/swiper.min.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/js/core.js"></script>
    <script>
    	(function() {
    		$(".hamburger-menu").on("click", function() {
    			$(".bar").toggleClass("animate");
    		});
    	})();
    </script>

    <?php wp_footer(); ?>

    </body>

    </html>