<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header();?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
  
  	<div class="contact-map"><?php echo do_shortcode('[wc_googlemap title="' . get_field('map_title') .'" location="'. get_field('address') .'" zoom="14" title_on_load="no" height="300" class=""]');?></div>
  		<div class="rows">
     <?php
	  while ( have_posts() ) : the_post();
	  ?>
	  <?php the_content();?>
	    <?php
	  endwhile;
	?>
</div>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>