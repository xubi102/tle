<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */


  if(is_category( 'khach-hang' )){
      get_template_part('category-khachhang');
  }
  else if(is_category( 'tin-tuc' ) || is_category( 'news' )){
      get_template_part('category-tintuc');
  }
  else if(is_category( 'tuyen-dung' ) || is_category( 'van-hoa-tle' ) ){
      get_template_part('category-tuyendung');
  }
  else if( is_category( 'gioi-thieu' )){
      get_template_part('category-gioithieu');
  }
  else if(is_category( 'san-pham' )){
      get_template_part('category-sanpham');
  }
  else if(is_category( 'tai-lieu' )){
      get_template_part('category-tailieu');
  }
  else if(is_category( 'hinh-anh' )){
      get_template_part('category-hinhanh');
  }
  else if(is_category( 'video' )){
      get_template_part('category-video');
  }
  else if(is_category( 'dich-vu' )){
      get_template_part('category-dichvu');
  }
  else{
    $cat = get_query_var('cat');
    $yourcat = get_category ($cat);
    $yourcat = get_category ($yourcat->parent);
    while($yourcat->parent > 0){
      $yourcat = get_category ($yourcat->parent);
    }
            
    if($yourcat->slug == 'khach-hang'){
      get_template_part('category-khachhang-list');
    }
    else if($yourcat->slug == 'san-pham'){
      get_template_part('category-sanpham-sub');
    }
    else if($yourcat->slug == 'tai-lieu'){
      get_template_part('category-tailieu-list');
    }
  }

  ?>

