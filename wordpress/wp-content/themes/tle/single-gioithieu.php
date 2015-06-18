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

  $category = get_the_category(); 
$category = $category[0]; 

  

   while($category->parent > 0){
      $category = get_category ($category->parent);
   }
 $cat = $category->cat_ID;
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
              <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
              <li<?php echo ($postid == get_the_ID())?' class="active"':'';?>><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
              <?php endwhile; ?>
              <?php foreach ($childcats as $childcat):?>
               <?php
                $args   =   array(
                  'category__in'      =>  array($childcat->cat_ID),
                  'post_status'       =>  'publish'
                );
                query_posts($args);
              ?>
              <li class="<?php echo (have_posts())?' hasSub':'';?>"><a href="<?php echo strpos($childcat->slug,'iso-90012008')?home_url().'category/tai-lieu':'#';?>" title="<?php echo $childcat->cat_name;?>"><?php echo $childcat->cat_name;?></a>
<?php if(have_posts()):?>
                   <ul class="childMenu">
                    <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
                    <li><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
                  <?php endwhile; ?>
                </ul>
                  <?php endif; ?>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        
        <div class="leftSidebar hidden-sm hidden-md hidden-lg">
          <select class="form-control">
            <?php $i = 0; while ( have_posts() ) : the_post(); ?><!-- start of loop -->
            <option value="<?php the_permalink();?>" <?php echo ($i == 0)?' selected="selected"':'';?>><?php the_title();?></a></option>
            <?php $i++; endwhile; ?>
            <?php foreach ($childcats as $childcat):?>
             <?php
              $args   =   array(
                'category__in'      =>  array($childcat->cat_ID),
                'post_status'       =>  'publish'
              );
              query_posts($args);
            ?>
            <option value="<?php echo strpos($childcat->slug,'iso-90012008')?home_url().'category/tai-lieu':'#';?>" class="<?php echo (have_posts())?' hasSub':'';?>" <?php echo ($actual_link == get_permalink())?' selected="selected"':'';?>>
              <?php echo $childcat->cat_name;?>
            </option>
              <?php if(have_posts()):?>
                  <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
                    <option value="<?php the_permalink();?>" <?php echo ($actual_link == get_permalink())?' selected="selected"':'';?> > - <?php the_title();?></option>
                  <?php endwhile; ?>
              <?php endif; ?>
            
            <?php endforeach; ?>
          </select>
        </div>
        <?php wp_reset_query(); ?>
        <div class="bodyRight col-md-9 col-lg-9">
          <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
            <h1 class="titleDetail"><?php the_title();?></h1>
            <div class="content">
              <?php the_content();?>
           <?php endwhile; ?>
        </div>
<?php get_footer(); ?>

