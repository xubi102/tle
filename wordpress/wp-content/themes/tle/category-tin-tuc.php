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
  $yourcat = get_category ($cat);
  

  $year = '&year='.date("Y");
  if(isset($_GET['year']) && !empty($_GET['year'])){
    $year = '&year='.intval($_GET['year']);
  }
  query_posts('cat='.$cat . $year);
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php the_archived_year($yourcat->slug);?>
<?php while ( have_posts() ) : the_post(); ?><!-- start of loop -->
<?php the_title();?>

<?php endwhile; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

