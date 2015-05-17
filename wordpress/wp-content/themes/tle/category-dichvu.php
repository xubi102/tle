<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

  get_header(); 
  global $tle_language;
 $cat = get_query_var('cat');
  $args   =   array(
    'category__in'      =>  array($cat),
    'post_status'       =>  'publish'
  );
  query_posts($args);
?>
<div class="bodyRight col-md-12 col-lg-12">
  <div class="row content services">
      <?php while ( have_posts() ) : the_post();?>
    <div class="col-md-4 col-lg-4">
      <div class="thumbCat">
        <a href="#"><?php the_post_thumbnail('full');?></a>
      </div>
      <a href="#" class="nameServices"><?php the_title();?></a>
      <p class="des"><?php the_content();?></p>
    </div>
   <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>

