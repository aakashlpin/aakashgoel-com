<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>

	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/css/reset.css" />
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/css/animate.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<!-- Adding "maximum-scale=1" fixes the Mobile Safari auto-zoom bug: http://filamentgroup.com/examples/iosScaleBug/ -->
	<link href='http://fonts.googleapis.com/css?family=Reenie+Beanie|Nobile:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styles.less">
	<link rel="stylesheet" media="all" href="<?php bloginfo('template_url'); ?>/css/social-buttons.css" />
	<link href="<?php bloginfo('template_url'); ?>/css/social-buttons.css" rel="stylesheet">

	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/less-1.2.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/primary.js"></script>
	<script type="text/javascript">
		var base = '<?php bloginfo('url'); ?>';	
	</script>

	
</head>

<body lang="en">
	<div class="background-overlay" style="display:none;">
		<img src="<?php bloginfo('template_url'); ?>/images/loader.gif" alt="loader">
	</div>
	<div class="article-categories-container">
		<div class="article-categories">
			<ul class="categories">
				<?php
				$categories = get_categories();
				foreach ($categories as $cat)
				{
				?>
					<li class="<?= $cat->cat_name; ?>"><a><?= $cat->cat_name; ?></a></li>
				<?php
				}
				?>
 			</ul>
		<span class="handle"><img src="<?php bloginfo('template_url'); ?>/images/handle.png" alt="graphic"></span>
		</div>
	</div>
	<header class="header">
		<h1 class="name">Aakash Goel</h1>
		<h5 class="black-shadow">The Occassional Blogger</h5>
		<div class="header-right">
			
			<div class="fan-fare">
				<img src="<?php bloginfo('template_url'); ?>/images/handle-right.png" class="handle-right" alt="graphic"/>
				<span class="about h5">
					Hi! I am a Software Developer working in Bangalore, India. I love developing User Interfaces, headbanging to Thrash Metal and Swimming.
				</span><br />
				<a href="https://twitter.com/aakashlpin" class="twitter-follow-button" data-show-count="false">Follow @aakashlpin</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
				</script>
			</div>
			<div class="go-back" style="display:none;">
				<a href="#" class="home">Home</a>
			</div>
		</div>
	</header>

	<section class="wrapper">