<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package xc
 */
?>

	  </div>
    </div><!-- #content -->

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
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
