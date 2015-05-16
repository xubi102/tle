<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xc
 */
  global $wp, $tle_language;
if(!is_user_logged_in()) {
 
$current_url = home_url( $wp->request ) ;
  wp_redirect( home_url(). $tle_language["dang-nhap-link"][ICL_LANGUAGE_CODE].'?return='.$current_url); exit;
}

  get_header(); 

  $cat = get_query_var('cat');
  $args   =   array(
    'category__in'      =>  array($cat),
    'post_status'       =>  'publish'
  );
  query_posts($args);
  $childcats = get_categories('parent=' . $cat . '&hide_empty=0');
?>
 <div class="document">
        <div class="row">
      <?php foreach ($childcats as $childcat):?>              
          <div class="col-md-2 col-lg-2 ">
            <a href="<?php echo get_category_link($childcat->cat_ID);?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/folder.jpg" alt=""></a>
            <a href="<?php echo get_category_link($childcat->cat_ID);?>"><?php echo $childcat->cat_name;?></a>
          </div>
          <?php endforeach; ?>

           </div>
    </div>
<?php get_footer(); ?>

