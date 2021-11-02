<?php
/*
Template Name: custome-page
*/




get_header();
?>

<!-- content -->

<div class="wrapper">
        <!-- wrapper -->

        <!-- content -->
        <section class="section__content">
            <div class="container">
                <div class="content">
                    <div class="content__info">
                        <h1><?php the_field('about_title'); ?></h1>
                        <p><?php the_field('about_desc'); ?></p>
                        <div class="content__button">
                            <a target="_blanck" href="<?php the_field('company_link'); ?>">Get Started</a>
                        </div>
                    </div>
                    <div class="content__images">
                        <img src="<?php the_field('about_image'); ?>" alt="#">
                    </div>
                </div>                
            </div>
        </section>
        <!-- content -->

        <!-- info -->
        <section class="section__info">
            <div class="container">
                <div class="info">
                    <h2><?php the_field('title_two_block'); ?></h2>
                    <div class="info__content">
                        <div class="block__content">
                            <img src="<?php the_field('block_two_image1'); ?>" alt="#">
                            <h3><?php the_field('title_colum1'); ?></h3>
                            <p><?php the_field('text_block_one'); ?></p>
                        </div>
                        <div class="block__content">
                            <img src="<?php the_field('block_two_image2'); ?>" alt="#">
                            <h3><?php the_field('title_colum2'); ?></h3>
                            <p><?php the_field('text_block_two'); ?></p>
                        </div>
                        <div class="block__content">
                            <img src="<?php the_field('block_two_image3'); ?>" alt="#">
                            <h3><?php the_field('title_colum3'); ?></h3>
                            <p><?php the_field('text_block_three'); ?></p>
                        </div>
                        <div class="block__content">
                            <img src="<?php the_field('block_two_image4'); ?>" alt="#">
                            <h3><?php the_field('title_colum4'); ?></h3>
                            <p><?php the_field('text_block_four'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- info -->

        <!-- slider -->
        <section class="section__slider">
            <div class="container">
                <div class="slider">
                    <h3><?php the_field('title_slider'); ?></h3>
                    <div class="slider__block">
                        <div class="next slider__button slider__button_left">
                            <img src="<?php the_field('slider_button_left'); ?>" alt="">
                        </div>
                        <div class="prev slider__button slider__button_right">
                            <img src="<?php the_field('slider_button_right'); ?>" alt="">
                        </div>
                    </div>
                <div class="multiple-items">
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider1'); ?>" alt="#">
                    </div>
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider2'); ?>" alt="#">
                    </div>
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider3'); ?>" alt="#">
                    </div>
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider4'); ?>" alt="#">
                    </div>
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider5'); ?>" alt="#">
                    </div>
                    <div class="slider__item">
                        <img src="<?php the_field('image_slider5'); ?>" alt="#">
                    </div>
                </div>
                </div>
            </div>
        </section>
         <!-- slider -->

         <!-- form -->
        <div class="section__form">
            <div class="container">
                <div class="form">
                    <div class="form__image">
                        <img src="<?php the_field('form_image'); ?>" alt="#">
                    </div>
                    <div class="form__block">
                        <h2><?php the_field('title_form'); ?></h2>
                        <?php echo do_shortcode( '[contact-form-7 id="42" title="Без названия"]' );?>
                    </div>
                </div>
            </div>
        </div>
        <!-- form -->

        <!-- woocommerce вывод товаров -->
        <div class="container">
            <h3>Магазин</h3>

            <?php echo do_shortcode('[product_category per_page="4" orderby="date" order="desc" category="misc"]'); ?>
            <?php echo do_shortcode('[woocommerce_cart]'); ?>
            <?php echo do_shortcode('[woocommerce_checkout]'); ?>
            <?php echo do_shortcode('[woocommerce_my_account]'); ?>
            <?php echo do_shortcode('[woocommerce_order_tracking]'); ?> 
            
        </div>
        <!-- woocommerce вывод товаров -->

        <!-- вывод постов -->
        <div class="container">
        
        </div>
        <!-- вывод постов -->

        <!-- wrapper -->
    </div>

<!-- content -->



<?php get_footer(); ?>

