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
          <div class="row">
            <div class="content">
          <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
          

            <div class="col-md-12 col-lg-12 firstNews">
                  <a href="#"><?php the_post_thumbnail('full');?></a>
                  <div class="bginfoNews"></div>
                  <div class="infoNews">
                    <a href="#" class="titleNews"><?php the_title();?></a>
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
        </div>
<?php get_footer(); ?>