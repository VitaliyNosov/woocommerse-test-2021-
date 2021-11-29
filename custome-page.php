<?php
/*
Template Name: custome-page
*/




get_header();
?>

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

