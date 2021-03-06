<!DOCTYPE html>
<html lang="en">
	<head>
		<?php 
		// Load Kissmetric if the user is not logged in
		if(!is_user_logged_in()) { ?>
		<script src="//cdn.optimizely.com/js/4564016.js"></script>
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
		<?php } ?>
		<meta charset="utf-8">
		<title><?php wp_title( '' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

		<!-- Styles -->
		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style.css" />
		<script type="text/javascript" src="//use.typekit.net/sec8pvi.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- GA -->
		<?php 
		// Load Google Ananlytics if user is not logged in and not Thank You page
		if(!is_user_logged_in()) { ?>
		<?php if(!is_page('thank-you')) { ?>
			<script>
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-499993-14']);
				//_gaq.push(['_setDomainName', 'seedprod.com']);
				_gaq.push(['_setAllowLinker', true]);
				_gaq.push(['_trackPageview']);

				(function() {
					var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
					ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
					var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
			</script>
		<?php } ?>
		<?php } ?>


	<!-- load jQuery & wp-head -->
	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
	
	<?php 
	// Load eJunkie code if is the Pricing page
	if(is_page('pricing')){ ?>
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

	<script>
var _prum = [['id', '5175cfcbabe53d7e26000000'],
             ['mark', 'firstbyte', (new Date()).getTime()]];
(function() {
    var s = document.getElementsByTagName('script')[0]
      , p = document.createElement('script');
    p.async = 'async';
    p.src = '//rum-static.pingdom.net/prum.min.js';
    s.parentNode.insertBefore(p, s);
})();
</script>
    
	</head>

	<body <?php body_class(); ?> data-spy="scroll" data-target="#featurespy">
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
					<a class="brand" href="http://www.seedprod.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/seedprod-logo-white.png" alt="SeedProd Logo"></a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<?php if(is_page('thank-you')): ?>
							<li><a href="http://www.seedprod.com" >Back to SeedProd</a></li>
							<?php else: ?>
							<li><a href="/"><i class="icon-home icon-white"></i> Home</a></li>
							<li><a href="/features/"><i class="icon-star icon-white"></i> Features</a></li>
							<li><a href="/pricing/"><i class="icon-certificate icon-white"></i> Pricing</a></li>
							<!-- <li><a href="http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing" onclick="_gaq.push(['_link',
'http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing']); return false;">Pricing</a></li> -->
							<li><a href="/showcase/"><i class="icon-picture icon-white"></i> Showcase</a></li>
							<li><a href="/blog/"><i class="icon-pencil icon-white"></i> Blog</a></li>
							<li><a href="/support/"><i class="icon-user icon-white"></i> Support</a></li>
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
	<div class="bt-header handscript">
	</div>


		<div id="bd">
		<div class="container">