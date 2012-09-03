<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?php wp_title( '' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<!-- Le styles -->
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/hellobar-solo/hellobar.css" />
		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- GA -->
		<?php if(!is_user_logged_in()) { ?>
		<script>
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-499993-14']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<?php } ?>

	<?php wp_enqueue_script("jquery"); ?>
	<!-- wp-head -->
	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="pg">

		<div id="hd">	
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/seedprod-logo.png" alt="SeedProd Logo"></a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li><a href="/">Home</a></li>
							<li><a href="/features/">Features</a></li>
							<li><a href="/pricing/">Pricing</a></li>
							<li><a href="/showcase/">Showcase</a></li>
							<li><a href="/blog/">Blog</a></li>
							<li><a href="/support/">Support</a></li>
						</ul>
					</div><!-- .nav-collapse -->
				</div>

			</div>
		</div> <!-- /.navbar -->
		<?php
		if ( is_home() ) {
			get_template_part( 'content', 'featured' );
		}
		?>
	</div> <!-- /#hb -->


		<div id="bd">
		<div class="container">