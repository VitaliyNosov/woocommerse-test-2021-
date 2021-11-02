<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wordpress-test-2021
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Тестовое-03-10-2021</title>

    <?php wp_head(); ?>

	<div class="wrapper">
        <!-- wrapper -->
        <!-- heaeder -->
        <header>
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <a href="">
                            <!-- <img src="img/logo.svg" alt="#"> -->
                            <?php the_custom_logo(); ?>
                        </a>
                        <div class="burger__button">
                            <i class="fas fa-align-justify"></i>
                        </div>
                    </div>
                    <div class="menu">
                        <?php
			                wp_nav_menu( array(
				            'theme_location' => 'menu-1',
				            'menu_class' => 'menu__items'
			                ));
		                ?>

                        <!-- Выводим корзину -->

                        <!-- Подробное описание: https://yourblogcoach.com/how-to-add-woocommerce-cart-icon-in-menu/ -->

                            <?php echo do_shortcode( '[woocommerce_cart_icon]' );?>

                        <!-- Выводим корзину -->

                        <!-- <div class="menu__items">
                            
                            <a href="">About</a>
                            <a href="">Product</a>
                            <a href="">Pricing</a>
                            <a href="">Resources</a>
                            <a href="">Jobs</a>
                        </div> -->
                    </div>
                    <div class="button__block">
                        <button class="button__login">Login</button>
                        <button class="button__singup">Sing up</button>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- heaeder -->
