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
		<title>Billing - SeedProd</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
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


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>

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
							<li><a href="#"  onclick="history.back(-1)">Back to SeedProd</a></li>
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
	<div class="container">
		<div class="well">
			{{mj-checkout-form}}
			</div><!--/row -->
		</div>
	</div><!-- /container -->


    </div> <!-- /.container -->
    </div> <!-- /#db -->

    <footer id="ft">
	    <div class="container">
		    <div id="footer-wrap">
				<div class="row-fluid">
					<div class="span2">
						<h5>SeedProd</h5>
						<div id="footer-1">
							<ul class="unstyled">
								<li><a href="/about/" style="padding-left:0">About</a></li>
								<li><a href="/contact/">Contact</a></li>
								<li><a href="/testimonials/">Testimonials</a></li>
								<li><a href="/affiliates/">Affiliates</a></li>
								<li><a href="/press-kit/">Press Kit</a></li>
							</ul>							
						</div>
					</div>
					<div class="span2">
						<div id="footer-2">
							<h5>Policies</h5>
							<ul class="unstyled">
								<li class="dlist"><a href="/terms/">Terms &amp; Conditions</a></li>
								<li class="dlist"><a href="/refunds/">Refund Policy</a></li>
								<li class="dlist"><a href="/privacy/">Privacy Policy</a></li>
							</ul>							
						</div>
					</div>
					<div class="span8">
						<div id="footer-3">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.png">
							<p>
								Copyright &copy; <?php echo date('Y') ?> SeedProd
							</p>
							<span>
								<a href="http://twitter.com/seedprod"><img id="twitter-icon" style="padding-right:3px" src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-twitter.png"></a>
								<a href="http://feeds.feedburner.com/seedprod"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-feed.png"></a>
							</span>
						</div>
					</div>
				</div>
		    </div><!-- #footer-wrap -->
	    </div>
    </footer><!-- #ft -->

    </div><!-- #pg -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap.min.js"></script>


	<!-- Record Kissmetric Events -->
	<script>
		_kmq.push(['record', 'Viewed Mijireh Billing Page']);
	</script>
  </body>
</html>