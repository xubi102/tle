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
  query_posts($args);
  $childcats = get_categories('child_of=' . $yourcat->parent . '&hide_empty=0');
?>
      <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar hidden-xs">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?>
              <li><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php $i++; endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
              <li<?php echo ($cat == $childcat->cat_ID)?' class="active"':'';?>><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="leftSidebar hidden-sm hidden-md hidden-lg">
            <select class="form-control">
              <option value=""><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></option>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?>
                <option value="<?php the_permalink();?>"><?php the_title();?></option>
              <?php $i++; endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
                <option value="<?php echo get_category_link($childcat->cat_ID);?>" <?php echo ($cat == $childcat->cat_ID)?' selected="selected"':'';?>>
                <?php echo $childcat->cat_name;?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <?php
          $args   =   array(
            'category__in'      =>  array($cat),
            'post_status'       =>  'publish',
            'showposts' => 1
          );
          query_posts($args);
          $postId = null;
        ?>
        <div class="bodyRight hinh-anh col-md-9 col-lg-9">
            <div class="content">
          <?php while ( have_posts() ) : the_post(); $postId = get_the_ID();?><!-- start of loop -->
          

            <div class="col-md-12 col-lg-12 firstNews">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full');?></a>
                  <div class="bginfoNews"></div>
                  <div class="infoNews">
                    <a href="<?php the_permalink();?>" class="titleNews"><?php the_title();?></a>
                    <p class="desNews"><?php the_content();?></p>
                  </div>
              </div>
           <?php endwhile; ?>
           <?php
            $args   =   array(
              'category__in'      =>  array($cat),
              'post_status'       =>  'publish',
              'post__not_in'      => array($postId)
            );
            query_posts($args);
          ?>
             <div class="row">
               <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
                <div class="col-md-4 col-lg-4">
                  <div class="thumbCat">
                    <a href="<?php the_permalink();?>" class="thumbImg">
                      <?php the_post_thumbnail('full');?>
                      <span class="iconCamera"></span>
                    </a>
                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                  </div>
                </div>
                <?php endwhile; ?>
              </div>
              </div>
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

