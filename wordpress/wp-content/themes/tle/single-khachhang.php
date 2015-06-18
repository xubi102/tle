<?php
/**
 * The template for displaying all single posts.
 *
 * @package xc
 */

get_header();
global $tle_language;
$postid = get_the_ID();
$category = get_the_category();
$yourcat = $category[0];

  $args   =   array(
    'category__in'      =>  array($yourcat->cat_ID),
    'post_status'       =>  'publish'
  );
  query_posts($args);

?>

<div class="bodyLeft col-md-3 col-lg-3">
  <div class="leftSidebar hidden-xs">
    <h2 class="titleSidebar"><?php echo $tle_language["khach-hang-khac"][ICL_LANGUAGE_CODE]?></h2>
    <ul>
      <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
      <li<?php echo ($postid == get_the_ID())?' class="active"':'';?>><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></li>
      <?php endwhile; ?>
    </ul>
  </div>
  <div class="leftSidebar hidden-sm hidden-md hidden-lg">
    <select class="form-control">
      <?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
      <option value="<?php the_permalink();?>" <?php echo ($postid == get_the_ID())?' selected="selected"':'';?>>
        <?php the_title();?>
      </option>
      <?php endwhile; ?>
    </select>
  </div>
</div>
<?php wp_reset_query(); ?>

<div class="bodyRight col-md-9 col-lg-9">

	
		<?php while ( have_posts() ) : the_post(); ?>
            <h1 class="titleDetail">
            	<?php the_title();?>            	
            </h1>
            <div class="content">
		
				<?php  the_content(); ?>

			
	  		</div>
	  		<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="g-plusone" data-size="medium" data-href="<?php the_permalink();?>"></div>
		<?php endwhile; // end of the loop. ?>

</div>