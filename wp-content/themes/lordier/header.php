<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Lordier
 * @since Lordier 1.0
 */
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php if (defined('WPSEO_VERSION')) { wp_title(); } else { bloginfo('name'); wp_title(' - ', true, 'left'); } ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
        <?php wp_head();?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <?php if ( !is_user_logged_in() ) {?>
        <div class="wrapper-log">
            <div class="wrapper">
            	<form name="loginform" class="main-form" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
                	<h2>Privé</h2>
                    <?php $current_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
						  $failed =  home_url().'/?login=failed';
						if ($current_url==$failed){
					 ?>
                    <p class="text-danger" style="font-weight:bold; font-size:13px;">The Username or Password is Incorrect!</p>
                    <?php }?>
                    <input name="log" id="user_login" required aria-describedby="login_error" class="mypass" placeholder="Username.." value="" size="20" type="text">
                    <input name="pwd" id="user_pass" required aria-describedby="login_error" class="mypass" placeholder="Password.." value="" size="20" type="password">
                    <input name="wp-submit" id="wp-submit" class="mylog" value="Soumettre" type="submit">
                    
                    <input name="redirect_to" value="<?php 'http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI] '?>" type="hidden">
                    <input name="testcookie" value="1" type="hidden">
                    
                </form>
                
                
            </div>
        </div>
        <?php } else{?>
        
        <?php
		$current_userid = get_current_user_id();
		global $user_login, $current_user;
		if (is_user_logged_in()) {
			get_currentuserinfo();
			$user_info = get_userdata($current_user->ID);
		
			if (in_array('administrator', $user_info->roles) || $current_userid == 1) {
		?>
        <!--Menu Start-->
		<div class="menu_part">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<nav class="main-menu">
                        	<?php wp_nav_menu(array('theme_location'=>'primary-menu')); ?>
                        </nav>
					</div>
				</div>
			</div>
		</div>
		<!--Menu end-->
        <?php }}?>

        <!--Header Start-->
		<div class="header_part">
			<div class="container">
				<div class="row">
					<!--<div class="col-sm-5 col-md-5 col-lg-5">
						<div class="logo">
                        	<a href="<?php bloginfo('url'); ?>"><img src="http://lordier.fr/wp-content/uploads/2017/05/lordier-logo.png" alt=""></a>
                        </div>
					</div>-->
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    	<div class="search-wrapper" >
                            <form role="search" method="get" id="searchform">
                                <div class="input-group">
                                    <input value="" name="s" id="s" type="text" class="form-control" placeholder="Please Type Your Project Name..." >
                                    <div class="input-group-btn">
                                        <button id="searchsubmit" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
						</div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                    	<div class="search-wrapper" >
                    		<a class="btn btn-danger pull-right" href="<?php echo wp_logout_url(home_url()); ?>">Logout</a>
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!--Header end-->
        
        
        
        <?php } ?>