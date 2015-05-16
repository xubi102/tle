<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

  get_header(); 
  $cat = get_query_var('cat');
   $yourcat = get_category ($cat);
   $args   =   array(
    'category__in'      =>  array($cat),
    'post_status'       =>  'publish'
  );
  query_posts($args);
?>
<div class="description">
  <div class="logoProject col-md-3 col-lg-3">
    <img src="<?php echo bloginfo('template_url'); ?>/assets/img/<?php echo $yourcat->slug;?>.jpg" alt="">
  </div>
  <div class="col-md-9 col-lg-9">
     <?php echo category_description( $cat ); ?> 
  </div>
</div>
<div class="content">
  <?php 
      while ( have_posts() ) : the_post(); ?><!-- start of loop -->
    <div class="col-md-3 col-lg-3">
      <div class="thumbCat">
        <?php the_post_thumbnail('full');?>
        <a href="<?php the_permalink();?>"><?php the_title();?></a>
      </div>
    </div>
  <?php endwhile;?>
</div>
<?php get_footer(); ?>

