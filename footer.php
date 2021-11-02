<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpress-test-2021
 */

?>

        <!-- footer -->
        <footer>
            <div class="container">
                <div class="footer__body">
                    <div class="column__block">
                        <div class="footer__column">
                            <h3>Company</h3>
                            <?php
			                    wp_nav_menu( array(
				                'theme_location' => 'menu-footer-1',
				                'menu_class' => ''
			                    ));
		                    ?>
                            <!-- <ul>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul> -->
                        </div>
                        <div class="footer__column">
                            <h3>Support</h3>
                            <?php
			                    wp_nav_menu( array(
				                    'theme_location' => 'menu-footer-2',
				                    'menu_class' => ''
			                        ));
		                    ?>
                            <!-- <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Safety Center</a></li>
                                <li><a href="#">Community Guidelines</a></li>
                            </ul> -->
                        </div>
                        <div class="footer__column">
                            <h3>Legal</h3>
                            <?php
			                    wp_nav_menu( array(
				                    'theme_location' => 'menu-footer-3',
				                    'menu_class' => ''
			                        ));
		                    ?>
                            <!-- <ul>
                                <li><a href="#">Cookies Policy</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">Law Enforcement</a></li>
                            </ul> -->
                        </div>
                        <div class="footer__column install__app">
                            <h3>Install App</h3>
                            <div class="commun__company">
                                <a href="">
                                    <div class="link__google"></div>
                                </a>
                                <a href="#">
                                    <div class="link__apple"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="social__block">
                        <?php dynamic_sidebar('sidebar-1'); ?>
                        <!-- <p>© 2020 Friendly All rights reserved</p> -->
                        <div class="icons">
                            <div class="icon">               
                                <a target="_blanck" href="<?php the_field('instagram_link'); ?>">
                                    <i class="fab fa-instagram"></i></div>
                                </a>                                
                            <div class="icon">
                                <a target="_blanck" href="<?php the_field('dribbble_link'); ?>">
                                    <i class="fab fa-dribbble"></i>
                                </a>
                            </div>
                            <div class="icon">
                                <a target="_blanck" href="<?php the_field('twitter_link'); ?>">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                            <div class="icon">
                                <a target="_blanck" href="<?php the_field('youtube_link'); ?>">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </footer>
        <!-- footer -->

<?php wp_footer(); ?>

</body>
</html>