<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript">
		  var _kmq = _kmq || [];
		  var _kmk = _kmk || '63828df3d2d2aeba257d2f7de26f8aa14dbe43e1';
		  function _kms(u){
		    setTimeout(function(){
		      var d = document, f = d.getElementsByTagName('script')[0],
		      s = d.createElement('script');
		      s.type = 'text/javascript'; s.async = true; s.src = u;
		      f.parentNode.insertBefore(s, f);
		    }, 1);
		  }
		  _kms('//i.kissmetrics.com/i.js');
		  _kms('//doug1izaerwt3.cloudfront.net/' + _kmk + '.1.js');
		</script>
		<meta charset="utf-8">
		<title><?php wp_title( '' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- GA -->
		<?php if(!is_user_logged_in()) { ?>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-499993-14']);
				_gaq.push(['_setDomainName', 'seedprod.com']);
				_gaq.push(['_setAllowLinker', true]);
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
	
	<?php if(is_page('pricing')){ ?>
	<script language="javascript" type="text/javascript">
			function EJEJC_lc(th) { return false; }
			function EJEJC_config(){EJEJC_POSTCALL=true;}
			function EJEJC_shown() {jQuery("#imgHeader").attr("src", "//s3.amazonaws.com/static.seedprod.com/seedprod-logo-157x40.png").css('margin','10px').css('height','40px');
			jQuery("#tdPmntOptions > table").css('width','auto');
			jQuery("#ejejctable td").css('border','1px solid #fff').css('padding','3px 5px');
			jQuery("#ejejctable tr:eq(4) td,#ejejctable table").css('border','none');
			}
	</script>
	<script src='//www.e-junkie.com/ecom/box.js' type='text/javascript'></script>
	<?php } ?>
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
							<?php if(is_page('checkout')): ?>
							<li><a href="#"  onclick="history.back(-1)">Back to SeedProd</a></li>
							<?php else: ?>
							<li><a href="/">Home</a></li>
							<li><a href="/features/">Features</a></li>
							<li><a href="/pricing/">Pricing</a></li>
							<!-- <li><a href="http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing" onclick="_gaq.push(['_link',
'http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing']); return false;">Pricing</a></li> -->
							<li><a href="/showcase/">Showcase</a></li>
							<li><a href="/blog/">Blog</a></li>
							<li><a href="/support/">Support</a></li>
							<?php endif; ?>
						</ul>
					</div><!-- .nav-collapse -->
				</div>

			</div>
		</div> <!-- /.navbar -->
		<?php
		if ( is_front_page() ) {
			get_template_part( 'content', 'featured' );
		}
		?>
	</div> <!-- /#hb -->


		<div id="bd">
		<div class="container">