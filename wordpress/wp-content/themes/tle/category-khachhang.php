<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */

  get_header(); 
  $cat = get_query_var('cat');
  $childcats = get_categories('child_of=' . $cat . '&hide_empty=0');

?>
    <div class="description col-md-4 col-lg-4">
          <div class="col-md-12 col-lg-12">
            <?php echo category_description( $cat ); ?> 
          </div>
        </div>
        <div class="content col-md-8 col-lg-8">
          <?php foreach ($childcats as $childcat):?>              
              <div class="col-md-6 col-lg-6">
                <div class="thumbCat">
                  <a href="<?php echo get_category_link($childcat->cat_ID);?>">
                    <img src="<?php echo bloginfo('template_url'); ?>/assets/img/<?php echo $childcat->slug;?>.jpg" alt="">
                  </a>
                  <a href="<?php echo get_category_link($childcat->cat_ID);?>"><?php echo $childcat->cat_name;?></a>
                </div>
              </div>
          <?php endforeach; ?>
        </div>
<?php get_footer(); ?>

