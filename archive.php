<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocommerce_2021
 */

get_header();
?>

	<div class="container">
		<div class="row">
			<div class="col-2">123</div>
			<div class="col-10">
      			<?php woocommerce_content(); ?>
			</div>
		</div>
	</div><!-- #main -->

<?php
get_sidebar();
get_footer();
