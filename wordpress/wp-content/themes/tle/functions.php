<?php
/**
 * xc functions and definitions
 *
 * @package xc
 */
global $tle_language;
$tle_language = array(
  "key" => array(
      "vi" => 'vi_VN',
      "en" => 'en_US'
  ),
  "danh-muc" => array(
      "vi" => 'Danh mục',
      "en" => 'Danh mục'
  ),
  "chi-tiet" => array(
      "vi" => 'Chi tiết',
      "en" => 'Chi tiết'
  ),
  "luu-tru" => array(
      "vi" => 'Lưu trữ',
      "en" => 'Lưu trữ'
  ),
  "all" => array(
      "vi" => 'Tất cả',
      "en" => 'All'
  )

);


function the_archived_year($cat, $current_year) {
  global $wpdb, $tle_language;
  $months = $wpdb->get_results( "SELECT DISTINCT YEAR( p.post_date ) AS year 
                                 FROM $wpdb->posts p
                                 LEFT OUTER JOIN $wpdb->term_relationships r ON r.object_id = p.ID 
                                 LEFT OUTER JOIN $wpdb->terms t ON t.term_id = r.term_taxonomy_id
                                 WHERE p.post_status = 'publish'  and p.post_type = 'post' AND t.slug = '".$cat->slug."'
                                 ORDER BY p.post_date DESC");?>
<h2 class="titleSidebar"><?php echo $tle_language["luu-tru"][ICL_LANGUAGE_CODE]?></h2>
            <ul>
              
          
  <?php foreach($months as $month) : ?>
      <li<?php echo ($month->year == $current_year)?' class="active"':'';?>><a href="?cat=<?php echo $cat->cat_ID;?>&year=<?php echo  $month->year;?>" title="<?php echo  $month->year;?>"><?php echo  $month->year;?></a></li>
  <?php     
  endforeach; ?>
    </ul>
<?php
}


if ( ! function_exists( 'xc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xc_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on xc, use a find and replace
	 * to change 'xc' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'xc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'xc' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'xc_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // xc_setup
add_action( 'after_setup_theme', 'xc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xc_content_width', 640 );
}
add_action( 'after_setup_theme', 'xc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function xc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'xc' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'xc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function xc_scripts() {
	wp_enqueue_style( 'xc-style', get_stylesheet_uri() );

	wp_enqueue_script( 'xc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'xc-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
  wp_enqueue_script( 'bxslider', get_template_directory_uri() . '/assets/js/jquery.bxslider.min.js', array(), '20150318', true );
  wp_enqueue_script( 'xc-main', get_template_directory_uri() . '/assets/js/main.js', array(), '20150318', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xc_scripts' );

function is_element_empty($element) {
  $element = trim($element);
  return !empty($element);
}

if ( ! function_exists( 'my_paging' ) ) :   
  function get_last_paging( $label = null, $max_page = 0 ) {
    global $paged, $wp_query;

    if ( !$max_page )
      $max_page = $wp_query->max_num_pages;

   // if ( !$paged )
    //  $paged = 1;

   // $nextpage = intval($paged) + 1;
   // if($nextpage >  $max_page)
     //  $nextpage = $max_page;

    if ( null === $label )
      $label = __( 'Last Page &raquo;' );

    $attr = apply_filters( 'last_cat_link_attributes', '' );
    return '<a href="' . get_pagenum_link($max_page) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
    
  }

  function get_next_paging( $label = null, $max_page = 0 ) {
    global $paged, $wp_query;

    if ( !$max_page )
      $max_page = $wp_query->max_num_pages;

    if ( !$paged )
      $paged = 1;

    $nextpage = intval($paged) + 1;
    if($nextpage >  $max_page)
       $nextpage = $max_page;

    if ( null === $label )
      $label = __( 'Next Page &raquo;' );

    $attr = apply_filters( 'next_cat_link_attributes', '' );
    return '<a href="' . get_pagenum_link($nextpage) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
    
  }

  function get_first_paging( $label = null ) {
    global $paged;

   

    if ( null === $label )
      $label = __( '&laquo; First Page' );

      $attr = apply_filters( 'first_cat_link_attributes', '' );
      return '<a href="' . get_pagenum_link(1) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
  //  }
  }

  function get_previous_paging( $label = null ) {
    global $paged;

    if ( !$paged )
      $paged = 1;

    $prevpage = intval($paged) - 1;
    if($prevpage <  1)
       $prevpage = 1;

    if ( null === $label )
      $label = __( '&laquo; Previous Page' );

      $attr = apply_filters( 'previous_cat_link_attributes', '' );
      return '<a href="' . get_pagenum_link($prevpage) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
  //  }
  }

  function get_item_paging( $label = null ) {
    global $paged, $wp_query;

    if ( !$paged )
      $paged = 1;

    $prevpage = intval($paged) - 1;
    if($prevpage <  1)
       $prevpage = 1;

    if ( null === $label )
      $label = __( '&laquo; Previous Page' );

      $attr = apply_filters( 'previous_cat_link_attributes', '' );
      return '<a href="' . get_pagenum_link($prevpage) . "\" $attr>" . preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $label) . '</a>';
  //  }
  }

  /**
   * Displays navigation to next/previous pages when applicable.
   */
  function my_paging( $args = '') {
    global $paged, $wp_query;
    if ( !$paged )
      $paged = 1;

    $defaults = array(       
      'end_size' => 1,
      'mid_size' => 2,
      'prev' => '<',
      'next' => '>',
      'first' => '<<',
      'last' => '>>'
    );

    $args = wp_parse_args( $args, $defaults );

    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
      $end_size = 1;
    }

    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
      $mid_size = 2;
    }
    $dots = false;
    $html_id = esc_attr( $html_id);
    $total = $wp_query->max_num_pages;
 
    if ( $total > 1 ) : ?>
      <ul class="pagination">
        <?php if($paged > 1){?>
          <li><?php echo get_first_paging( __( '<span class="first">'. $args['first'] .'</span>', 'my' ) );?></li>
          <?php
        }
        if($paged > 1){?>
          <li><?php echo get_previous_paging( __( '<span class="prev">'. $args['prev'] .'</span>', 'my' ) );?></li>
          <?php
        }
        for ($i = 1; $i <= $total ; $i++) { 
        if($i == $paged){
        ?>
         <li class="active"><a href="<?php echo get_pagenum_link($i);?>"><?php echo $i;?></a></li>
         <?php
         $dots = true;
        }
        else
        {
          if ( ( $i <= $end_size || ( $paged && $i >= $paged - $mid_size && $i <= $paged + $mid_size ) || $i > $total - $end_size ) ) {
          ?>
           <li><a href="<?php echo get_pagenum_link($i);?>"><?php echo $i;?></a></li>
          <?php
          $dots = true;
          }
          elseif ( $dots ) {
            ?>
            <li class="dot"><span><?php echo __( '&hellip;' )?></span></li>
            <?php
            $dots = false;
          }
        }
       }
       if($paged < $total){
         ?>
        <li><?php echo get_next_paging( __( '<span class="next">'. $args['next'] .'</span>', 'my' ) ); ?></li>
        <?php }
        if($paged < $total){?>
          <li><?php echo get_last_paging( __( '<span class="last">'. $args['last'] .'</span>', 'my' ) );?></li>
          <?php
        }?>
      </ul><!-- #<?php echo $html_id; ?> .navigation -->
    <?php endif;
  }
endif;

//sort array by field
function sortarray($all_cat, $b)
{
    if ($all_cat['description'] == $b['description']) {
        return 0;
    }
    return ($all_cat['description'] < $b['description']) ? -1 : 1;
}

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/*
*Customize menu
*/
require get_template_directory() . '/inc/nav.php';
