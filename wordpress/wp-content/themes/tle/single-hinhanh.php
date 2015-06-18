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
  $postId = get_the_ID();
 $category = get_the_category(); 

   $cat = $category[0]->cat_ID;
  $yourcat = get_category ($cat);
  $args   =   array(
    'category__in'      =>  array($yourcat->parent),
    'post_status'       =>  'publish'
  );
  query_posts($args);
  $childcats = get_categories('child_of=' . $yourcat->parent . '&hide_empty=0');
?>
      <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              <?php $i = 0; while ( have_posts() ) : the_post(); ?><!-- start of loop -->
              <li><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php $i++; endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
              <li<?php echo ($cat == $childcat->cat_ID)?' class="active"':'';?>><a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>

       <?php wp_reset_query(); ?>
        <div class="bodyRight col-md-9 col-lg-9">
            <h1 class="titleDetail"><?php the_title();?></h1>
   <?php if( have_rows('list') ): ?>       
        
              <?php while( have_rows('list') ): the_row(); 

                // vars
                $image = get_sub_field('image');
                ?>
                <div class="col-md-4 col-lg-4">
                  <div class="thumbCat">
                    <a href="<?php echo $image['url']; ?>" class="thumbImg clbthumb" rel="thumbphoto">
                     <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/>
                    </a>
                  </div>
                </div>
            
              <?php endwhile; ?>
           <?php endif; ?>  
            </div>
        </div>
<?php get_footer(); ?>