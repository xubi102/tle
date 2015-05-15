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
   $childcats = get_categories('parent=' . $cat . '&hide_empty=0');
?>
     <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <?php if(count($childcats) > 0): $title = $childcats[0]->cat_name;
              $sub_childcats = get_categories('parent=' . $childcats[0]->cat_ID . '&hide_empty=0');
            ?>
            <ul>
              <li class="active <?php echo count($sub_childcats) > 0?' hasSub':'';?>">
                  <a href="<?php echo get_category_link($childcats[0]->cat_ID);?>" title="<?php echo $childcats[0]->cat_name;?>"><?php echo $childcats[0]->cat_name;?></a>
                  <?php if(count($sub_childcats) > 0):?>
                   <ul class="childMenu">
                    <?php foreach ($sub_childcats as $sub_childcat):?>
                    <li><a href="<?php echo get_category_link($sub_childcat->cat_ID);?>" title="<?php echo $sub_childcat->cat_name;?>"><?php echo $sub_childcat->cat_name;?></a></li>
                  <?php endforeach; ?>
                </ul>
                  <?php endif; ?>
              </li>
              <?php  for ($i=1; $i < count($childcats); $i++): $childcat = $childcats[$i]?>
              <li>
                  <a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a>
              </li>
              <?php endfor; ?>
            </ul>
          <?php endif;?>
          </div>
        </div>
        
        <?php wp_reset_query(); ?>
          <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->

          <div class="bodyRight col-md-9 col-lg-9">
          <div class="row">
            <h1 class="titleDetail"><?php the_title();?></h1>
          </div>
        </div>

          <div class="bodyRight col-md-7 col-lg-7">
          <div class="row">
            <div class="content">
              <?php the_content(); ?>
            </div>
          </div>
        </div>

          <div class="download col-md-2 col-lg-2">
          <div class="row">
            <div class="content rightSidebar">
              <div class="title">Download</div>
              <?php if( have_rows('download') ): ?>

              <ul>

              <?php while( have_rows('download') ): the_row(); 

                // vars
                $image = get_sub_field('thumbnail');
                $tile = get_sub_field('title');
                $file = get_sub_field('file');
                ?>

                <li>
                  <a href="<?php echo $file[url];?>">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                      <span class="icon-download"><?php echo $tile;?></span>
                  </a>
                    
                </li>

              <?php endwhile; ?>
               <?php endif; ?>
            </div>
          </div>
        </div>
           <?php endwhile; ?>
        </div>
<?php get_footer(); ?>

