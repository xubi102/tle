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
  if(!empty($cat)){
      $yourcat = get_category ($cat);
  }
  else{
      $slug = (ICL_LANGUAGE_COD =='en')?'news':'tin-tuc';
      $yourcat = get_category_by_slug($slug); 
  }

 
  
  $y = date("Y");
  $year = '&year='.date("Y");
  if(isset($_GET['year']) && !empty($_GET['year'])){
    $year = '&year='.intval($_GET['year']);
    $y = $_GET['year'];
  }
  query_posts('cat='.$cat . $year);

?>
<div class="bodyLeft col-md-3 col-lg-3">
          <div class="leftSidebar">
            <?php the_archived_year($yourcat, $y);?>
          </div>
        </div>


        <div class="bodyRight col-md-9 col-lg-9">
          <div class="banner">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/banner-content-right.jpg" alt="Tin tức">
          </div>
          <ul class="listItem">
            <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
            <li class="item">
              <span class="datetime"><?php echo date_format(date_create($post->post_modified),"M d, Y") ?></span>
              <span class="titleItem"><a href="<?php the_permalink();?>"><?php the_title();?></a></span>
            </li>
            <?php endwhile; ?>
          </ul>
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

