<?php
/**
 * Template Name: Home
 */
?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo bloginfo('url'); ?>/wp-content/plugins/ml-slider/assets/sliders/flexslider/flexslider.css" />
  </head>
  <body class="home">    
    <?php
      if (ICL_LANGUAGE_CODE == "en"){
        // query for the about page
      $mquery = new WP_Query( 'pagename=home-en' );
      }else{
        // query for the about page
        $mquery = new WP_Query( 'pagename=home' );
      }
      // "loop" through query (even though it's just one page) 
      while ( $mquery->have_posts() ) : $mquery->the_post();
        $contact_form =get_field('contact_form');
       ?>
    <header>
      <div class="slider">
         <?php echo do_shortcode(the_content()); ?> 
      </div>
      <div class="wrap">
        <div class="logo pc">
          <a href="<?php echo bloginfo('url'); ?>" alt="TLE Logo" title="TLE Logo">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo.png" alt="TLE">
          </a>
        </div>
      </div>

      <div class="bgHeader"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/bg-header.jpg" alt="TLE bg"></div>
      
      <div class="wrap sm">
        <div class="logo">
          <a href="<?php echo bloginfo('url'); ?>">
            <img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo.png" alt="TLE">
          </a>
        </div>
      </div>
      
      <div class="wrap sm">
        <div class="searchbox">
          <form action="<?php echo bloginfo('url'); ?>">
            <input type="text" id="search" name="s" class="txtSearch" value="<?php echo wp_specialchars($s, 1); ?>" />
            <input type="submit" id="submit" class="iconSearch" />
          </form>
        </div>  
      </div>

      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="mainNav">
        <div class="wrap">
          <ul class="language">
            <li><a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-en.jpg" alt="English"></a></li>
            <li><a href="#"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-vi.jpg" alt="Tiếng Việt"></a></li>
          </ul>
          <?php
						wp_nav_menu( array(
							'menu'    => 'top',
							'walker'  => new themeslug_walker_nav_menu_pc()
						));
					?>
        </div>
      </div>
      <div class="mainNavSm">
          <?php
            wp_nav_menu( array(
              'menu'    => 'top',
              'walker'  => new themeslug_walker_nav_menu_sm()
            ));
          ?>
          <ul class="language">
            <li><a href="<?php echo site_url();?>/en"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-en.jpg" alt="English"></a></li>
            <li><a href="<?php echo site_url();?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-vi.jpg" alt="Tiếng Việt"></a></li>
          </ul>
      </div>
    </header>
    <section class="overview">
      <div class="container">
          <div class="des"><?php echo $tle_language["gioi-thieu-tong-quan"][ICL_LANGUAGE_CODE]?></div>
            
            <?php if( have_rows('overview') ): ?>
              <ul class="listItem clearfix">
              <?php  while ( have_rows('overview') ) : the_row();
                  $image = get_sub_field('ovr_img');
              ?>
                  <li>
                    <a href="#"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"></a>
                    <p><span><?php the_sub_field('ovr_name'); ?></span></p>
                  </li>
            <?php endwhile; ?>
            </ul>
          <?php endif; ?>
      </div>
    </section>
    
    <section class="organize">
      <div class="container">
          <h3 class="titleSection"><?php echo $tle_language["so-do-to-chuc"][ICL_LANGUAGE_CODE]?></h3>
          <p class="des"><?php echo $tle_language["bao-gom-cac-thanh-vien"][ICL_LANGUAGE_CODE]?></p>
          <?php if( have_rows('organization') ): ?>

              <?php  while ( have_rows('organization') ) : the_row();
                  $image = get_sub_field('ogz_img');
              ?>
                <div class="col-md-3 col-lg-3">
                  <div class="thumbCat">
                    <a href="<?php the_sub_field('ogz_link'); ?>">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
                    </a>
                  </div>
                  <a href="<?php the_sub_field('ogz_link'); ?>" class="nameServices"><?php the_sub_field('ogz_name'); ?></a>
                </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <div class="col-md-2 col-lg-2 col-md-offset-5">
            <a class="btnProfile" href="<?php the_field('profile_file'); ?>"><?php echo $tle_language["tai-profile"][ICL_LANGUAGE_CODE]?></a>
          </div>
      </div>
    </section>
    <section class="services">
      <div class="container">
          <h3 class="titleSection"><?php echo $tle_language["dich-vu"][ICL_LANGUAGE_CODE]?></h3>
          <?php if( have_rows('services') ): ?>

              <?php  while ( have_rows('services') ) : the_row();
                  $image = get_sub_field('srv_img');
              ?>
                <div class="col-md-4 col-lg-4">
                  <div class="thumbCat">
                    <a href="<?php the_sub_field('srv_link');?>"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"></a>
                  </div>
                  <a href="<?php the_sub_field('srv_link'); ?>" class="nameServices"><?php the_sub_field('srv_name'); ?></a>
                  <p class="des"><?php the_sub_field('srv_des'); ?></p>
                </div>
            <?php endwhile; ?>
          <?php endif; ?>
      </div>
    </section>
    <section class="culture">
      <div class="container">
          <div class="col-md-10 col-lg-10 col-md-offset-1">
            <p class="title1"><?php echo $tle_language["van-hoa"][ICL_LANGUAGE_CODE]?></p>
            <p class="title2"><?php the_field('culture_big'); ?></p>
            <p class="title3"><?php the_field('culture_small'); ?></p>
          </div>
      </div>
    </section>
    <section class="news">
      <div class="container">
          <h3 class="titleSection"><?php echo $tle_language["tin-tuc"][ICL_LANGUAGE_CODE]?></h3>
          <div class="col-md-6 col-lg-6">
            <div class="newsBox">
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/tin-noi-bo.jpg" alt="">
              <div class="titleBox1"><?php echo $tle_language["tin-noi-bo"][ICL_LANGUAGE_CODE]?></div>
            </div>
            <div class="listBox">
              <?php
                if(ICL_LANGUAGE_CODE==en){
                  $the_slug = 'news';
                }else{
                  $the_slug = 'tin-tuc';
                }
                
                $args=array(
                  'category_name'  => $the_slug,
                  'post_type'      => 'post',
                  'post_status'    => 'publish',
                  'posts_per_page' => 4
                );
                $my_posts = get_posts( $args );
                if( $my_posts ) { ?>
                  <ul>
                  <?php foreach ( $my_posts as $post ) :  setup_postdata( $post ); ?>
                      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endforeach; ?>
                  </ul>
                <?php
                }?>
            </div>
          </div>
          <div class="col-md-6 col-lg-6">
            <div class="newsBox">
              <img src="<?php echo bloginfo('template_url'); ?>/assets/img/tuyen-dung.jpg" alt="">
              <div class="titleBox2"><?php echo $tle_language["tuyen-dung"][ICL_LANGUAGE_CODE]?></div>
            </div>
            <div class="listBox">
              <?php
                if(ICL_LANGUAGE_CODE==en){
                  $the_slug = 'recruitment-news';
                }else{
                  $the_slug = 'tin-tuyen-dung';
                }
                
                $args=array(
                  'category_name'  => $the_slug,
                  'post_type'      => 'post',
                  'post_status'    => 'publish',
                  'posts_per_page' => 4
                );
                $my_posts = get_posts( $args );
                if( $my_posts ) { ?>
                  <ul>
                  <?php foreach ( $my_posts as $post ) :  setup_postdata( $post ); ?>
                      <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                  <?php endforeach; ?>
                  </ul>
                <?php
                }?>
            </div>
          </div>
      </div>
    </section>
    <section class="contact">
      <div class="container">
        <div class="row">
          <h3 class="titleSection">
            <?php echo $tle_language["lien-he"][ICL_LANGUAGE_CODE]?>
          </h3>
          <p class="des"><?php echo $tle_language["lien-he2"][ICL_LANGUAGE_CODE]?></p>
          <div class="col-md-8 col-lg-8 col-md-offset-2">
           <?php echo do_shortcode($contact_form); ?> 
          </div>
        </div>
      </div>
    </section>
    <?php
      endwhile;
      // reset post data (important!)
      wp_reset_postdata();
    ?>
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="ftLeft">
               <div class="logoFooter">
                  <img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo2.jpg" alt="">
                </div>
                <div class="info">
                  <span class="infoItem">
                    Địa chỉ trụ sở: số 44 - Hào Nam - Quận Đống Đa - Hà Nội
                  </span>
                  <span class="infoItem">
                    Điện thoại: +84-4.39783799 | Fax :  +84-4.39783799
                  </span>
                  <span class="infoItem">
                    Email: thanglongelevator@tle.com.vn
                  </span>
                </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 box2">
            <div class="ftRIght">
              <div class="copyright">
                Copyright@2013 TLE. All right reserved
              </div>
              <div class="social">
                <a href="<?php echo get_option('gbs_fb-link'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/fb.jpg" alt="fb"></a>
                <a href="<?php echo get_option('gbs_tw-link'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/tw.jpg" alt="tw"></a>
                <a href="<?php echo get_option('gbs_g-link'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/gg.jpg" alt="gg"></a>
                <a href="<?php echo get_option('gbs_l-link'); ?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/link.jpg" alt="link"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
  
<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/assets/js/jquery-1.10.2.min.js'></script>
<script type='text/javascript' src='<?php echo bloginfo('url'); ?>/wp-content/plugins/ml-slider/assets/sliders/flexslider/jquery.flexslider-min.js'></script>
<script type='text/javascript' src='<?php echo bloginfo('template_url'); ?>/assets/js/main-home.js'></script>
</html>