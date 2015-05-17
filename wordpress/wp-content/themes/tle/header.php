<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package xc
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/jquery.bxslider.css">
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_url'); ?>/assets/css/main.css">

<?php wp_head(); 
global $tle_language;
?>
<?php if(is_single()){ ?>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/<?php echo $tle_language["key"][ICL_LANGUAGE_CODE];?>/sdk.js#xfbml=1&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    
    (function() {

	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;

	    po.src = '//apis.google.com/js/plusone.js';

	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);

	})();
    </script>
<?php } ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header>
			<div class="bgHeader"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/bg-header.jpg" alt="TLE bg"></div>
			<div class="wrap">
				<div class="logo">
					<a href="<?php echo bloginfo('url'); ?>">
						<img src="<?php echo bloginfo('template_url'); ?>/assets/img/logo.png" alt="TLE">
					</a>
				</div>
			</div>
			<div class="wrap">
				<div class="searchbox">
					<form action="">
						<input type="text" id="search" name="txtSearch" class="txtSearch" />
						<input type="submit" id="submit" class="iconSearch" />
					</form>
				</div>  
			</div>
			<div class="mainNav">
				<div class="wrap">
					<ul class="language">
						<li><a href="<?php echo site_url();?>/en"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-en.jpg" alt="English"></a></li>
						<li><a href="<?php echo site_url();?>"><img src="<?php echo bloginfo('template_url'); ?>/assets/img/icon-vi.jpg" alt="Tiếng Việt"></a></li>
					</ul>
					<?php
						wp_nav_menu( array(
							'menu'    => 'top',
							'walker'  => new themeslug_walker_nav_menu_pc()
						));
					?>
				</div>
			</div>
			<div class="path">
				<div class="container">
					<?php the_breadcrumb();?>
					<!-- <ul>
						<li><a href="#">Trang chủ</a></li>
						<li>Tin tức</li>
					</ul>
					<h1 class="mainTitle">Tin tức</h1> -->
				</div>        
			</div>
		</header>

	 <div class="container">
      <div class="row">