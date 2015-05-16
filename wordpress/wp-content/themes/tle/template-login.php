<?php
/**
 * Template Name: Login
 */
  
global $tle_language;

if(isset($_POST['username']) && wp_verify_nonce($_POST['tle_login_nonce'], 'tle-login-nonce')) {
 
		// this returns the user ID and other info from the user name
		$user = get_userdatabylogin($_POST['username']);
 
		if(!$user) {
			// if the user name doesn't exist
			login_errors()->add('empty_username', __('Invalid username'));
		}
 
		if(!isset($_POST['password']) || $_POST['password'] == '') {
			// if no password was entered
			login_errors()->add('empty_password', __('Please enter a password'));
		}
 
		// check the user's login with their password
		if(!wp_check_password($_POST['password'], $user->user_pass, $user->ID)) {
			// if the password is incorrect for the specified user
			login_errors()->add('empty_password', __('Incorrect password'));
		}
 
		// retrieve all error messages
		$errors = login_errors()->get_error_messages();
 
		// only log the user in if there are no errors
		if(empty($errors)) {
 
			wp_setcookie($_POST['username'], $_POST['password'], true);
			wp_set_current_user($user->ID, $_POST['username']);	
			do_action('wp_login', $_POST['username']);
			$return = (isset($_GET['return']) && $_GET['return'] != '')?$_GET['return']:home_url();
			wp_redirect($return);
			 exit;
		}
	}

?>

<?php get_header();
?>


	<div class="col-md-4 col-lg-4 col-md-offset-4 login-doc">
      <p><?php echo $tle_language["dang-nhap-text"][ICL_LANGUAGE_CODE]?></p>
      <?php
		// show any error messages after form submission
		login_show_error_messages(); ?>
      <form action="" method="post">
      	<input type="hidden" name="tle_login_nonce" value="<?php echo wp_create_nonce('tle-login-nonce'); ?>"/>
        <input type="text" name="username" placeholder="<?php echo $tle_language["tai-khoan"][ICL_LANGUAGE_CODE]?>">
        <input type="password" name="password" placeholder="<?php echo $tle_language["mat-khau"][ICL_LANGUAGE_CODE]?>">
        <input type="submit" class="send" value="<?php echo $tle_language["dang-nhap"][ICL_LANGUAGE_CODE]?>">
      </form>
    </div>


<?php get_footer(); ?>