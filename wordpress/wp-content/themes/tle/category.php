<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

  get_header(); 

  if(is_category( 'khach-hang' )){
      get_template_part('category-khachhang');
  }
  else if(is_category( 'tin-tuc' ) || is_category( 'news' )){
      get_template_part('category-tintuc');
  }
  else if(is_category( 'tuyen-dung' ) || is_category( 'van-hoa-tle' )){
      get_template_part('category-tuyendung');
  }
  else{
    $cat = get_query_var('cat');
    $yourcat = get_category ($cat);
    $yourcat = get_category ($yourcat->parent);
    if($yourcat->slug == 'khach-hang'){
      get_template_part('category-khachhang-list');
    }
  }

  ?>

<?php get_footer(); ?>

