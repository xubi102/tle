<?php
/**
 * xc functions and definitions
 *
 * @package xc
 */
global $tle_language;
global $actual_link;
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
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
  "khach-hang-khac" => array(
      "vi" => 'Khách hàng khác',
      "en" => 'Khách hàng khác'
  ),
  "dang-nhap-link" => array(
      "vi" => 'dang-nhap',
      "en" => 'login'
  ),
  "dang-nhap" => array(
      "vi" => 'Đăng nhập',
      "en" => 'Login'
  ),
  "tai-khoan" => array(
      "vi" => 'Tài khoản',
      "en" => 'Username'
  ),
  "mat-khau" => array(
      "vi" => 'Mật khẩu',
      "en" => 'Password'
  ),
  "dang-nhap-text" => array(
      "vi" => 'Để xem tài liệu nội bộ vui lòng đăng nhập tài khoản',
      "en" => 'Để xem tài liệu nội bộ vui lòng đăng nhập tài khoản'
  ),
  "all" => array(
      "vi" => 'Tất cả',
      "en" => 'All'
  ),
  "trang-chu" => array(
      "vi" => 'Trang chủ',
      "en" => 'Home'
  ),
  "tim-kiem" => array(
      "vi" => 'Tìm kiếm',
      "en" => 'Search'
  ),
  "lien-he" => array(
      "vi" => 'liên hệ',
      "en" => 'Contact'
  ),
  "lien-he2" => array(
      "vi" => 'Vui lòng liên hệ chúng tôi theo thông tin dưới đây',
      "en" => 'Please contact us at the information below'
  ),
  "tin-noi-bo" => array(
      "vi" => 'tin nội bộ',
      "en" => 'local news'
  ),
  "tuyen-dung" => array(
      "vi" => 'tuyển dụng',
      "en" => 'recruitment'
  ),
  "tin-tuc" => array(
      "vi" => 'Tin tức',
      "en" => 'news'
  ),
  "van-hoa" => array(
      "vi" => 'Văn hóa tle',
      "en" => 'tle culture'
  ),
  "tai-profile" => array(
      "vi" => 'tải profile',
      "en" => 'profile download'
  ),
  "dich-vu" => array(
      "vi" => 'dịch vụ',
      "en" => 'services'
  ),
  "gioi-thieu-tong-quan" => array(
      "vi" => 'Tập đoàn Thang máy thiết bị Thăng Long là doanh nghiệp hàng đầu trong lĩnh vực <span class="red">cung cấp và lắp đặt thiết bị tòa nhà</span> tại thị trường Việt Nam',
      "en" => 'Tập đoàn Thang máy thiết bị Thăng Long là doanh nghiệp hàng đầu trong lĩnh vực cung cấp và lắp đặt thiết bị tòa nhà tại thị trường Việt Nam'
  ),
  "so-do-to-chuc" => array(
      "vi" => 'sơ đồ tổ chức',
      "en" => 'sơ đồ tổ chức'
  ),
  "bao-gom-cac-thanh-vien" => array(
      "vi" => 'Tập đoàn Thang máy thiết bị Thăng Long bao gồm các thành viên',
      "en" => 'Tập đoàn Thang máy thiết bị Thăng Long bao gồm các thành viên'
  ),
  "he-thong-quan-ly-chat-luong" => array(
      "vi" => 'Hệ thống quản lý chất lượng',
      "en" => 'Hệ thống quản lý chất lượng'
  ),
  "he-thong-quan-ly-chat-luong-2" => array(
      "vi" => 'HỆ THỐNG QUẢN LÝ CHẤT LƯỢNG ISO 9001:2008',
      "en" => 'HỆ THỐNG QUẢN LÝ CHẤT LƯỢNG ISO 9001:2008'
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

add_theme_support( 'post-thumbnails' ); 

function login_show_error_messages() {
  if($codes = login_errors()->get_error_codes()) {
    echo '<div class="login_errors">';
        // Loop error codes and display errors
       foreach($codes as $code){
            $message = login_errors()->get_error_message($code);
            echo '<span class="error"><strong>' . __('Error') . '</strong>: ' . $message . '</span><br/>';
        }
    echo '</div>';
  } 
}

// used for tracking error messages
function login_errors(){
    static $wp_error; // Will hold global variable safely
    return isset($wp_error) ? $wp_error : ($wp_error = new WP_Error(null, null, null));
}

function the_breadcrumb() {
    global $post, $tle_language;
    $title = '';
    echo '<ul>';
    if (is_search()) {

      echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo $tle_language["trang-chu"][ICL_LANGUAGE_CODE];
        echo '</a></li>';

      echo '<li>'. $tle_language["tim-kiem"][ICL_LANGUAGE_CODE] . '</li>';
      $title = $tle_language["tim-kiem"][ICL_LANGUAGE_CODE];

    }
    else if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo $tle_language["trang-chu"][ICL_LANGUAGE_CODE];
        echo '</a></li>';
        if (is_single()) {
            echo '<li>';
            $category = get_the_category(); 
            $cat = $category[count($category) - 1]->cat_ID;
            $yourcat = get_category ($cat);
            $title = $yourcat->name ;
            while($yourcat->parent > 0){
              $yourcat = get_category ($yourcat->parent);
            }

            if($yourcat->slug == 'san-pham'){
              $title = $yourcat->name;
            }

            echo $yourcat->name;
            echo '</li>';
        }
        else if (is_category()) {
            echo '<li>';
            $cat = get_query_var('cat');
            $yourcat = get_category ($cat);
            $title = $yourcat->name;
            while($yourcat->parent > 0){
                $yourcat = get_category ($yourcat->parent);
            }

            if($yourcat->slug == 'san-pham'){
              $title = $yourcat->name;
            }
            if($yourcat->slug == 'tai-lieu'){
              $title = $tle_language["he-thong-quan-ly-chat-luong-2"][ICL_LANGUAGE_CODE];
            }

            echo $yourcat->name;
            echo '</li>';
        } elseif (is_page()) {
         // print_r($post);
             if($post->post_name == 'dang-nhap' || $post->post_name == 'login'){
              echo '<li>';
              
              $title = $tle_language["he-thong-quan-ly-chat-luong-2"][ICL_LANGUAGE_CODE];
              echo $tle_language["he-thong-quan-ly-chat-luong"][ICL_LANGUAGE_CODE];
              echo '</li>';
             }
            // if($post->post_parent){
            //     $anc = get_post_ancestors( $post->ID );
            //     $title = get_the_title();
            //     foreach ( $anc as $ancestor ) {
            //         $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
            //     }
            //     echo $output;
            //     echo '<strong title="'.$title.'"> '.$title.'</strong>';
            // } else {
            //     echo '<li><strong> '.get_the_title().'</strong></li>';
            // }
         }
    }
    
    echo '</ul>';
    echo '<h1 class="mainTitle">' .$title. '</h1>';
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
  wp_enqueue_script( 'xc-colorbox', get_template_directory_uri() . '/assets/js/jquery.colorbox.js', array(), '20150318', true );
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
