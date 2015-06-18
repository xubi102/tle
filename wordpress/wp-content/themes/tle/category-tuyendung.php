<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

  get_header(); 
  global $tle_language;global $actual_link;
  $postid = get_the_ID();
  $cat = get_query_var('cat');
  $args   =   array(
    'category__in'      =>  array($cat),
    'post_status'       =>  'publish'
  );
  query_posts($args);
  $childcats = get_categories('parent=' . $cat . '&hide_empty=0');
?>
      <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar hidden-xs">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?>
              <li<?php echo ($actual_link == get_permalink())? ' class="active"':'';?>><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php $i++; endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
              <li><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="leftSidebar hidden-sm hidden-md hidden-lg">
            <select class="form-control">
              <option value=""><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></option>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?>
                <option value="<?php the_permalink();?>"   <?php echo ($actual_link == get_permalink())?' selected="selected"':'';?>><?php the_title();?></option>
                <?php $i++; endwhile; ?>
                <?php foreach ($childcats as $childcat):?>
                  <option value="<?php echo get_category_link($childcat->cat_ID);?>"><?php echo $childcat->cat_name;?></option>
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
        ?>
        <div class="bodyRight col-md-9 col-lg-9">
          <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
            <h1 class="titleDetail"><?php the_title();?></h1>
            <div class="content">
              <?php the_content();?>
            </div>
           <?php endwhile; ?>
        </div>
<?php get_footer(); ?>

