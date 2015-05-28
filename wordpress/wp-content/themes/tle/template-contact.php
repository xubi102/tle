<?php
/**
 * Template Name: Contact
 */
?>

<?php get_header();?>

	<?php
	  if ( have_posts() ) : 
	  ?>
  
  	<div class="contact-map"><?php echo do_shortcode('[wc_googlemap title="' . get_field('map_title') .'" location="'. get_field('address') .'" zoom="17" title_on_load="no" height="450" class=""]');?></div>
  	<?php if( have_rows('branch') ): ?>       
        <div class="list">
        	<div class="row">
              <?php while( have_rows('branch') ): the_row(); 

                // vars
                $name = get_sub_field('name');
                $address = get_sub_field('address');
                $tel = get_sub_field('tel');
                $fax = get_sub_field('fax');
                $email = get_sub_field('email');
                ?>
                <div class="item col-md-6 col-lg-6">
                	<div class="box">
	                 	<h4><?php echo $name;?></h4>
	                 	<p class="address"><?php echo $address;?></p>
	                 	<p class="tel">Tel: <?php echo $tel;?></p>
	                 	<p class="fax">Fax: <?php echo $fax;?></p>
	                 	<p class="email"><?php echo $email!=''?'Email: '.$email:'&nbsp;';?></p>
                 	</div>
                </div>
            
              <?php endwhile; ?>
              </div>
               </div>
           <?php endif; ?>  
  	
    <?php
	  while ( have_posts() ) : the_post();
	  ?>

	  <div class="form">
	  	<div class="bgContact"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/bg-from-contact.jpg"></div>
		<section class="contact">
			<div class="container">
				<div class="row">
					<h3 class="titleSection">
					Liên hệ
					</h3>
					<p class="des">Vui lòng liên hệ chúng tôi theo thông tin dưới đây</p>
					<div class="col-md-8 col-lg-8 col-md-offset-2">
				    	  <?php the_content();?>
					</div>
				</div>
			</div>
		</section>
	  
	    <?php
	  endwhile;
	?>
	
	<?php
	  endif;
	  ?>
   

<?php get_footer(); ?>