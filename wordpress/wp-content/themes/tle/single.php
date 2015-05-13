<?php
/**
 * The template for displaying all single posts.
 *
 * @package xc
 */

get_header(); 

$category = get_the_category();
$yourcat = $category[0];
get_template_part('single-'. $yourcat->slug);

?>
<!-- <div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="g-plusone" data-size="medium" data-href="<?php the_permalink();?>"></div> -->
<?php get_footer(); ?>
