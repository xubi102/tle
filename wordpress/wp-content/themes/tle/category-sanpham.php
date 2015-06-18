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
  $childcats = get_categories('parent=' . $cat . '&hide_empty=0');
  $title = "";
?>
    <div class="bodyLeft pc col-md-3 col-lg-3">
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

         <div class="bodyRight col-md-9 col-lg-9">
            <h1 class="titleDetail"><?php echo $title;?></h1>
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
          <div class="paging">
           <?php
              my_paging( array(       
                'end_size' => 1,
                'mid_size' => 6
              ));
            ?>
          </div>
        </div>
        <div class="bodyLeft sm pc col-md-3 col-lg-3">
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
<?php get_footer(); ?>

