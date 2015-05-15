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
  $yourcat = $yourcat2 = get_category ($cat);
  $parentcat = get_category ($yourcat->parent);
  if($parentcat->slug != 'san-pham'){
      $yourcat = get_category ($yourcat->parent);
  }

  $childcats = get_categories('parent=' . $yourcat->parent . '&hide_empty=0');

?>
    <div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <h2 class="titleSidebar"><?php echo $tle_language["danh-muc"][ICL_LANGUAGE_CODE]?></h2>
            <?php if(count($childcats) > 0):?>
            <ul>
            <?php  for ($i=0; $i < count($childcats); $i++):  $childcat = $childcats[$i];?>
            <?php if($yourcat->cat_ID == $childcat->cat_ID):
            $sub_childcats = get_categories('parent=' . $childcat->cat_ID . '&hide_empty=0');?>
              <li  class="active<?php echo count($sub_childcats) > 0?' hasSub':'';?>">
                  <a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a>
                   <?php if(count($sub_childcats) > 0):?>
                   <ul class="childMenu">
                    <?php foreach ($sub_childcats as $sub_childcat):?>
                    <li><a href="<?php echo get_category_link($sub_childcat->cat_ID);?>" title="<?php echo $sub_childcat->cat_name;?>"><?php echo $sub_childcat->cat_name;?></a></li>
                  <?php endforeach; ?>
                </ul>
                  <?php endif; ?>
              </li>
            <?php else:?>
             <li>
                <a href="<?php echo get_category_link($childcat->cat_ID);?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a>             
              </li>
            <?php endif;?>
              <?php endfor; ?>
            </ul>
          <?php endif;?>
          </div>
        </div>

         <div class="bodyRight col-md-9 col-lg-9">
          <div class="row">
            <h1 class="titleDetail"><?php echo $yourcat2->cat_name;?></h1>
          </div>
          <div class="row">
            <div class="content">
              <table class="titleTbl">
                <tr>
                  <td colspan="2">Use</td>
                  <td>Rate capacity (kg)</td>
                  <td>Number of persons</td>
                  <td>Rate speed (m/sec)</td>
                  <td>Maximum nuber of stops</td>
                  <td>Maximum travel (m)</td>
                </tr>
              </table>
              <?php 
                while ( have_posts() ) : the_post(); ?><!-- start of loop -->
              <div class="product clearfix">
                <div class="thumb">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail('full');?></a>
                </div>
                <div class="info">
                  <div class="nameProduct"><?php the_title();?></div>
                  <div><?php the_field('description') ?></div>
                  <div class="viewMore">
                    <a href="<?php the_permalink();?>"><?php echo $tle_language["chi-tiet"][ICL_LANGUAGE_CODE]?></a>
                  </div>
                </div>
              </div>
               <?php endwhile;?>
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

