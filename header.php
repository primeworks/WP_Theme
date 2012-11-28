<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title>
	<?php $the_title = wp_title('', false);
		if ($the_title != '') :
			echo wp_title('',false),' | '; bloginfo('name');
		else :
			bloginfo('name');
			if ($paged > 1) { echo ' - page '.$paged; } else { if ($blogdesc=get_bloginfo('description')) echo ' - '.$blogdesc; }
		endif; ?>
	</title>
	<?php if ( is_singular() && get_option('thread_comments') ) wp_enqueue_script('comment-reply'); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php wp_head(); ?>
	
	<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" />
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
	<div id="wrapper">
    	<div id="container">
        	<header id="header-main">
            	<div id="header-top">
                	<div id="header-login">
                    	<?php if(!is_user_logged_in()) { ?>
                    	<form method="post" id="header-login-form" action="?action=login&instance=1">
                        	<div class="element">
                            	<label for="login-form-user">Username:</label>
                                <input type="text" name="log" id="login-form-user" required="true" />
                            </div>
                        	<div class="element">
                            	<label for="login-form-pass">Password:</label>
                                <input type="password" name="pwd" id="login-form-pass" required="true" />
                            </div>
                        	<div class="element checkbox">
                                <input name="rememberme" type="checkbox" id="forget-me-not" value="forever" />
                                <label for="forget-me-not">Remember me</label>
                            </div>
                        	<div class="element button">
                                <input type="submit" value="Login" />
                                <input type="hidden" name="redirect_to" value="?<?php print $_SERVER['QUERY_STRING']; ?>" />
                                <input type="hidden" name="testcookie" value="1" />
                                <input type="hidden" name="instance" value="1" />
                            </div>
                        </form>
                        <?php } else { ?>
                        	<div class="hd-user-avatar"><?php $current_user = wp_get_current_user(); print get_avatar($current_user->ID, 100); ?></div>
                        <?php } ?>
                    </div>
                    <div id="header-join-link">
                    	<a href="/wp-register.php"><img src="/images/icons/join.png" alt="Register to Chataway!" /></a>
                    </div>
                    <div id="header-social">
                    	<ul>
	                    	<li id="social-rss"><a href="<?php bloginfo('rss2_url'); ?>">Subscribe to RSS feeds</a></li>
	                    	<li id="social-twitter"><a href="http://twitter.com/dRaXARTS">Follow us on Twitter</a></li>
	                    	<li id="social-facebook"><a href="http://facebook.com/dRaXARTS">Like our Facebook page</a></li>
                        </ul>
                    </div>
                    <div id="top-logo">
                    	<a href="/"><img src="/images/imgs/logo-top.png" alt="Chataway logo" /></a>
                    </div>
                </div>
                <div id="nav-and-search">
                	<nav id="main-menu">
                    	<?php wp_nav_menu (array('primary' => 'Primary Navigation'));?>
                    </nav>
                    <div id="search-area">
                    	<?php get_search_form(); ?>
                    </div>
                </div>
            </header>
            <section id="main">
            	<!-- home banner -->
                <section id="main-main">