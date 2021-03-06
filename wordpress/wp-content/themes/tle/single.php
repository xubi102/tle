<?php
/**
 * The template for displaying all single posts.
 *
 * @package xc
 */

get_header(); 
$category = get_the_category();
$yourcat = $category[0];

  if($yourcat->slug == 'khach-hang'){
      get_template_part('single-khachhang');
  }
  else if($yourcat->slug == 'tin-tuc' || $yourcat->slug =='news'){
      get_template_part('single-tintuc');
  }
  else if($yourcat->slug == 'tuyen-dung' || $yourcat->slug == 'van-hoa-tle'){
      get_template_part('single-tuyendung');
  }
  else if($yourcat->slug == 'gioi-thieu'){
      get_template_part('single-gioithieu');
  }
  else if($yourcat->slug == 'san-pham'){
      get_template_part('single-sanpham');
  }
  else if($yourcat->slug == 'tai-lieu'){
      get_template_part('single-tailieu');
  }
  else if($yourcat->slug == 'hinh-anh'){
      get_template_part('single-hinhanh');
  }
  else if($yourcat->slug == 'video'){
      get_template_part('single-video');
  }
  else{
    $yourcat = get_category ($yourcat->parent);
    while($yourcat->parent > 0){
      $yourcat = get_category ($yourcat->parent);
    }

    if($yourcat->slug == 'gioi-thieu'){
      get_template_part('single-gioithieu');
    }
    else if($yourcat->slug == 'tuyen-dung'){
      get_template_part('single-tin-tuyen-dung');
    }
    else{
       get_template_part('single-'. $yourcat->slug);
    }
	  //
  }

?>
<!-- <div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="g-plusone" data-size="medium" data-href="<?php the_permalink();?>"></div> -->
<?php get_footer(); ?>
