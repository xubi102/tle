<?php
/**
 * The template for displaying all single posts.
 *
 * @package xc
 */

get_header();
$category = get_the_category();
$yourcat = $category[0];
?>

<div class="bodyLeft col-md-3 col-lg-3">
  <div class="leftSidebar">
    <?php the_archived_year($yourcat, date_format(date_create($post->post_modified),"Y"));?>
  </div>
</div>


<div class="bodyRight col-md-9 col-lg-9">
	<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php echo date_format(date_create($post->post_modified),"h:i, d/m/Y") ?>
		<?php get_template_part( 'template-parts/content', 'single' ); ?>

	
		<?php endwhile; // end of the loop. ?>
	<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
</div>