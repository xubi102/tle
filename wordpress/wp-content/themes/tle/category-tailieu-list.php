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
    'category__in'      =>  array($cat),
    'post_status'       =>  'publish'
  );
  query_posts($args);
  $childcats = get_categories('parent=' . $yourcat->parent . '&hide_empty=0');
?>
      <div class="document">
        <div class="row">
          <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php foreach ($childcats as $childcat):?>
              <li <?php echo ($cat == $childcat->cat_ID)?' class="active"':'';?>><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="bodyRight col-md-9 col-lg-9">
          <div class="row titleBox">
            <div class="col-md-7 col-lg-7">
              <span>tên tài liệu</span>
            </div>
            <div class="col-md-2 col-lg-2">
              <span>danh mục</span>
            </div>
            <div class="col-md-2 col-lg-2">
              <span>ngày đăng</span>
            </div>
          </div>
          <?php while ( have_posts() ) : the_post(); 
             $file = get_field('file');

          ?><!-- start of loop -->
          <div class="row listDoc">
            <div class="col-md-7 col-lg-7">
              <a href="<?php echo $file[url];?>"><?php the_title();?></a>
            </div>
            <div class="col-md-2 col-lg-2">
              <span>Nội bộ</span>
            </div>
            <div class="col-md-2 col-lg-2">
              <span><?php echo date_format(date_create($post->post_modified),"d/m/Y") ?></span>
            </div>
          </div>
           <?php endwhile; ?>
          <div class="paging">
            <?php
              my_paging( array(       
                'end_size' => 1,
                'mid_size' => 6
              ));
            ?>
          </div>
        </div>
        </div>
      </div>
<?php get_footer(); ?>

