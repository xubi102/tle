<?php
/**
 * The template for displaying all single posts.
 *
 * @package xc
 */

get_header();
$category = get_the_category();
$yourcat = $category[0];
?>

<div class="bodyLeft col-md-3 col-lg-3">
  <div class="leftSidebar">
    <?php the_archived_year($yourcat, date_format(date_create($post->post_modified),"Y"));?>
  </div>
</div>


<div class="bodyRight col-md-9 col-lg-9">

	
		<?php while ( have_posts() ) : the_post(); ?>
            <h1 class="titleDetail">
            	<?php the_title();?>
            	<div>
            	<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

            	<small class="time"><?php echo date_format(date_create($post->post_modified),"h:i, d/m/Y") ?></small>
            	</div>
            </h1>
            <div class="content">
		
				<?php  the_content(); ?>

			
	  		</div>
	  		<div class="fb-like" data-href="<?php the_permalink();?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
        
		<?php endwhile; // end of the loop. ?>

</div>