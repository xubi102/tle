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
  $yourcat = get_category ($cat);
  $args   =   array(
    'category__in'      =>  array($yourcat->parent),
    'post_status'       =>  'publish'
  );

  $childcats = get_categories('child_of=' . $yourcat->parent . '&hide_empty=0');
  $query = new WP_Query( $args);

?>
      <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php if ( $query->have_posts() ):
                while ( $query->have_posts() ) : $query->the_post(); ?><!-- start of loop -->
              <li><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php endwhile; endif;?>
              <?php foreach ($childcats as $childcat):?>
              <li <?php echo ($cat == $childcat->cat_ID)?' class="active"':'';?>><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach;  ?>
            </ul>
            <div class="bannerSidebar">
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/banner-tuyen-dung.jpg" alt="">
            </div>
          </div>
        </div>


        <div class="bodyRight col-md-9 col-lg-9">
          <div class="row">
            <div class="col-md-4 col-lg-4">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/quy-trinh-tuyen-dung.jpg" alt="quy-trinh-tuyen-dung"></a>
            </div>
            <div class="col-md-4 col-lg-4">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/tai-sao-chon-tle.jpg" alt="tai-sao-chon-tle"></a>
            </div>
            <div class="col-md-4 col-lg-4">
              <a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/cau-hoi-thuong-gap.jpg" alt="cau-hoi-thuong-gap"></a>
            </div>
          </div>
          <div class="titleBox">
            <span class="titleCol1">Tin tuyển dụng</span>
            <span class="titleCol2">Ngày hết hạn</span>
          </div>
          <?php query_posts('cat='.$cat);?>
          <ul class="listItem tuyendung">
            <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
            <li class="item">
              <span class="titleItem"><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
              <?php $date = DateTime::createFromFormat('Ymd', get_field('expiration_date'));?>
              <span class="duedate"><?php echo $date->format('d/m/Y');?></span>
            </li>
            <?php endwhile; ?>
          </ul>
          <div class="paging">
            <?php
              my_paging( array(       
                'end_size' => 1,
                'mid_size' => 6
              ));
            ?>
          </div>
        </div>
<?php get_footer(); ?>

