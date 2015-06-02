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
  $postid = get_the_ID();

  $category = get_the_category(); 

   $cat = $category[0]->cat_ID;
   $args   =   array(
     'category__in'      =>  array($cat),
     'post_status'       =>  'publish'
   );
   query_posts($args);
   $childcats = get_categories('child_of=' . $cat . '&hide_empty=0');
?>
      <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar hidden-xs">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?><!-- start of loop -->
              <li<?php echo ($i == 0)?' class="active"':'';?>><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php $i++; endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
              <li><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="leftSidebar hidden-sm hidden-md hidden-lg">
            <select class="form-control">
              <option value=""><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></option>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?><!-- start of loop -->
                <option value="<?php the_permalink();?>"   <?php echo ($i == 0)?' selected="selected"':'';?>><?php the_title();?></option>
                <?php $i++; endwhile; ?>
                <?php foreach ($childcats as $childcat):?>
                  <option value="<?php echo get_category_link($childcat->cat_ID);?>"><?php echo $childcat->cat_name;?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <?php wp_reset_query(); ?>
        <div class="bodyRight col-md-9 col-lg-9">
          <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
          <div class="row">
            <h1 class="titleDetail"><?php the_title();?></h1>
            <div class="content">
              <?php the_content();?>
            </div>
          </div>
           <?php endwhile; ?>
        </div>
<?php get_footer(); ?>

