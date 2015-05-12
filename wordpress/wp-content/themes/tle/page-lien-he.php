<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
  
  	<ol class="breadcrumb"><li><a href="<?php echo home_url();?>">home</a></li><li><?php the_title();?></li></ol>
  	<div class="contact-map"><?php echo do_shortcode('[wc_googlemap title="' . get_field('map_title') .'" location="'. get_field('address') .'" zoom="14" title_on_load="no" height="300" class=""]');?></div>
  		<div class="rows">
     <?php
	  while ( have_posts() ) : the_post();
	  ?>
	  <div class="left col-md-9 col-sm-9 col-xs-12">
	    <h3 class="page-title"><?php the_title();?></h3>
	    <div><?php the_field('description_contact');?></div>
	    <div class="rows"><div class="col-md-9 col-sm-10 col-xs-12"> <?php echo do_shortcode(get_field('form_contact'));?></div></div>
	</div>
	<div class="right col-md-3 col-sm-3 col-xs-12">
		<h3  class="sider-title"><?php echo $alaw_language['contact'][ICL_LANGUAGE_CODE];?></h3>
	    
	    <div class="content"><?php echo get_option('gbs_contact_info_' . ICL_LANGUAGE_CODE); ?></div>
	    <div class="email"><a href="mailto:<?php echo get_option('gbs_contact_email_' . ICL_LANGUAGE_CODE); ?>"><?php echo get_option('gbs_contact_email_' . ICL_LANGUAGE_CODE); ?><a></div>
	</div>
	    <?php
	  endwhile;
	?>
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>