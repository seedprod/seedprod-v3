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

		<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style-b.css" />
				<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

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


		<!-- Banner -->
		<div id="product-banner">
		    <img class="thumbnail" src="<?php echo get_stylesheet_directory_uri(); ?>/images/products/banner-coming-soon-pro.jpg">
		    <!-- Buttons -->
		    <div class="product-btns">
		        <a href="/pricing/" class="btn btn-large btn-seedprod"><i class="icon-shopping-cart icon-white"></i> See Pricing</a> 
		        <!-- <a href="http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing" onclick="_gaq.push(['_link',
'http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing']); return false;" class="btn btn-seedprod"><i class="icon-shopping-cart icon-white"></i> Buy Now</a> --> 
		    </div>
		</div>
				


		<!-- Feature List -->
		<div id="features-tb-wrapper">
			<ul id="features-tb" class="nav nav-tabs">
			  <li class="active"><a href="#features" data-toggle="tab"><i class="icon-list"></i> Features</a></li>
			  <li><a href="#screenshots" data-toggle="tab"><i class="icon-picture"></i> Screenshots</a></li>
			  <li><a href="#video" data-toggle="tab"><i class="icon-facetime-video"></i> Video</a></li>
			  <li><a href="#preview" data-toggle="tab"><i class="icon-eye-open"></i> Live Preview</a></li>
			  <li><a href="#try" data-toggle="tab"><i class="icon-thumbs-up"></i> Try Before You Buy</a></li>
<!-- 			  <li><a href="#changelog" data-toggle="tab"><i class="icon-list-alt"></i> Changelog</a></li> -->
			</ul>
		<div class="tab-content">
		  <div class="tab-pane active" id="features">
		  	<div class="well">
		  		<div id="feature-list" class="row-fluid">
		  			<div class="span4">
			  			<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-wordpress.png" style="width:32px">
					      <h3>Compatible</h3>
			  				<ul>
			  					<li>Works with any WordPress Theme
			  						<small>Built with WordPress best practices and guidelines.</small>
			  					</li>
			  					<li>Automatic Updates through the WordPress Dashboard
			  						<small>Just like plugins you download form WordPress.org</small>
			  					</li>
			  					<li>Multisite Support</li>
			  					<li>Shortcode Support</li>
			  					<li>WPML Support</li>
			  					<li>Translation Ready i18n &amp; RTL Support<small>All text strings displayed, can be translated to your language.</small></li>
			  					<li>Built with HTML5 &amp; CSS3 using Bootstrap</li>
			  				</ul>
			  			</div>
			  			<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/lock_closed.png" style="width:32px">
					      <h3>Access Controls</h3>
			  				<ul>
			  					<li>Visible to non logged in Users
			  						<small>Work on your site behind the while visitors see the coming soon page.</small>
			  					</li>
			  					<li>Limit Access with Client View
			  						<small>Give your clients a secret link that allows them to bypass the Coming Soon page and view the website without logging in.</small>
			  					</li>
			  					<li>Allow users to view your site by IP</li>
			  					<li>Allow users to view your site by Role</li>
			  					<li>Include/Exclude URLs
			  						<small>Show the landing page on only parts of your site.</small>
			  					</li>
			  				</ul>
			  			</div>
		  			</div>
		  			<div class="span4">
		  				<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/chimpy.png" style="width:32px">
					      <h3>Email Marketing &amp; Data Capture</h3>
			  				<ul>
			  					<li>MailChimp with Groups Integration</li>
			  					<li>Mad Mimi Integration</li>
			  					<li>Aweber Integration</li>
			  					<li>Constant Contact Integration</li>
			  					<li>Campaign Monitor Integration</li>
			  					<li>GetResponse Integration</li>
			  					<li>mailPoet formally WYSIJA Integration</li>
			  					<li>Gravity Forms Integration</li>
			  					<li>Sendy.co Integration</li>
			  					<li><span class="label label-success">New</span> iContact Integration</li>
			  					<li><span class="label label-success">New</span> Infusionsoft Integration</li>
			  					<li>Use a Web Form from any 3rd Party Provider</li>
			  					<li>Store Emails in the WordPress Database</li>
			  					<li>Ability to Capture Name along with the Email</li>
			  				</ul>
			  			</div>
			  			<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/desktop_into_the_sun.png" style="width:32px">
					      <h3>Design</h3>
			  				<ul>
			  					<li>Custom Look &amp; Feel
  									<small>Customs colors, fonts, sizes, layout and more. All in an easy to use interface. No Coding!</small>
			  					</li>	
			  					<li>Mobile Ready &amp; Responsive</li>
			  					<li>Integrated Google Fonts</li>
			  					<li>Integrated with Typekit by Adobe</li>
			  					<li>Responsive Full Browser Backgrounds</li>
			  					<li><span class="label label-success">New</span> Full Screen Slideshows</li>
			  					<li>Custom Footer Branding
			  						<small>Display your logo on a client site fixed to the bottom.</small>
			  					</li>
			  					<li>Upgrade safe custom CSS &amp; Template</li>
			  					<li>Upgrade safe custom Social Icons Support</li>

			  				</ul>
			  			</div>

		  			</div>
		  			<div class="span4">
		  				<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/web_blue.png" style="width:32px">
					      <h3>Social</h3>
			  				<ul>
			  					<li>Social Follow Icons
			  						<small>Twitter, Facebook, LinkedIn, Google+, YouTube, Flickr, Vimeo, Pinterest, Instagram, Fouraquare, Tumblr, RSS, Email</small>
			  					</li>
			  					<li>Social Share Buttons
			  						<small>Twitter, Facebook, Google+, LinkedIn, Pinterest, Tumblr</small>
			  					</li>
			  					<li>Go Viral or run a Contest with the built Referral and Tracking System</li>
			  				</ul>
			  			</div>
			  			<div class="fl-feature" class="clearfix">
					      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/star.png" style="width:32px">
					      <h3>Misc</h3>
			  				<ul>
			  					<li>Search Engine Optimized
			  						<small>Optimized markup. Customizable meta data</small>
			  					</li>
			  					<li>Easily Embed Photos &amp; Videos
			  						<small>Embed your photos from Flickr or videos from YouTube, Vimeo and more just by pasting the url in the description.</small>
			  					</li>
			  					<li>Display an Incentive after Sign Up</li>
			  					<li>Progress Bar</li>
			  					<li>Countdown Timer</li>
			  					<li>Google Analytics Support</li>
			  					<li>Custom Favicon</li>
			  					<li>Import/Export Settings</li>
			  					<li>Maintenance Mode
			  						<small>Notify search engines that you are down without affecting your rank by delivering the proper 503 header http status.</small>
			  					</li>
			  					<li>Landing Page Mode
			  						<small>After you launch use the plugin to create a landing page on your site or run a contest.</small>
			  					</li>
			  				</ul>
			  			</div>
		  			</div>
		  		</div>
				<div class="row-fluid">
					<div class="span6">
						<blockquote class="twitter-tweet"><p>Looking for a "Coming Soon" solution for WordPress? <a href="http://t.co/OquhIcfp" title="http://Seedprod.com">Seedprod.com</a> is pretty hard to go past. Easiest config I've seen in ages.</p>&mdash; Dan Rippon (@danrippon) <a href="https://twitter.com/danrippon/status/216812725991510016" data-datetime="2012-06-24T08:39:16+00:00">June 24, 2012</a></blockquote>
					</div>
					<div class="span6">
						<blockquote class="twitter-tweet"><p>Awesome! @<a href="https://twitter.com/seedprod">seedprod</a> Your plugin lives up to it's name - surpassed all my expectations. Now on my standard list of recommendations.</p>&mdash; Tony Kinard (@TonyKinard) <a href="https://twitter.com/TonyKinard/status/212375297176248321" data-datetime="2012-06-12T02:46:31+00:00">June 12, 2012</a></blockquote>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span6">
						<blockquote class="twitter-tweet"><p>Just want to shout out @<a href="https://twitter.com/seedprod">seedprod</a> for seriously having the best coming soon plugin. Easy to use, beautiful to look at! Go check it out</p>&mdash; Jonathan (@SureFireWebServ) <a href="https://twitter.com/SureFireWebServ/status/210425206748094464" data-datetime="2012-06-06T17:37:33+00:00">June 6, 2012</a></blockquote>
					</div>
					<div class="span6">
						<blockquote class="twitter-tweet"><p>Need to create a great coming soon page for your WordPress website? Try @<a href="https://twitter.com/seedprod">seedprod</a>Excellent customer support, too!</p>&mdash; Lisa League, ASID (@agirlandaMac) <a href="https://twitter.com/agirlandaMac/status/224142107932229632" data-datetime="2012-07-14T14:03:37+00:00">July 14, 2012</a></blockquote>
					</div>
				</div>
				<br>
				<p>
					<a href="/testimonials/">See More Reviews <i class="icon-hand-right"></i></a>
				</p>
		  	</div>

		  </div> <!-- end tab -->
		  <div class="tab-pane" id="screenshots">
		  	<div class="well">
			<div class="row-fluid">
				<div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/screenshot1-600x384.png" alt="" width="600" height="384" class="thumbnail alignnone size-large wp-image-343" />
                </div>
                <div class="span3">
                	<h4>Coming Soon Lead Generation Example</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/thankyoupage-600x365.png" alt="" width="600" height="365" class="thumbnail alignnone size-large wp-image-346" />
                </div>
                <div class="span3">
                	<h4>After Sign Up Thank You Example</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img class="thumbnail alignnone size-large wp-image-24"  src="http://www.seedprod.com/wp-content/uploads/2012/11/video-600x364.png" alt="" width="600" height="364" />
                </div>
                <div class="span3">
                	<h4>Teaser Video Countdown Example</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/forms-600x507.png" alt=""  width="600" height="507" class="thumbnail alignnone size-large wp-image-342" />
                </div>
                <div class="span3">
                	<h4>Gravity Forms Integration Example</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/settings-600x2660.png" alt=""  width="600" height="2660" class="thumbnail alignnone size-large wp-image-344" />
                </div>
                <div class="span3">
                	<h4>Settings Tab</h4>
                </div>
            </div>
            <div class="row-fluid">
              	<div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/design-600x1761.png" alt=""  width="600" height="1761" class="thumbnail alignnone size-large wp-image-341" />
                </div>
                <div class="span3">
                	<h4>Design Tab</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/advanced-600x998.png" alt=""  width="600" height="998" class="thumbnail alignnone size-large wp-image-340" />
                </div>
                <div class="span3">
                	<h4>Advanced Tab</h4>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span9">
					<img src="http://www.seedprod.com/wp-content/uploads/2012/11/subscribers-600x360.png" alt=""  width="600" height="360" class="thumbnail alignnone size-large wp-image-345" />
                </div>
                <div class="span3">
                	<h4>Subscribers Tab</h4>
                </div>
            </div>

        </div>
         

		  </div><!-- end tab -->
		  <div class="tab-pane" id="video">
		  	<p>This is a video of Version 3.0.0, the current version of the plugin is 3.5.0 . Check out the Changelog for the updates. New update video walk through coming soon.</p>
		  	<iframe width="853" height="480" src="http://www.youtube.com/embed/PaUFSW3bxF8" frameborder="0" allowfullscreen style="display:block; margin:0 auto"></iframe>
		  </div><!-- end tab -->
		  <div class="tab-pane" id="preview"><a target="_blank" href="http://demo.seedprod.com/coming-soon-pro/">Live Preview</a> has opened in a new window.</div>
		  <div class="tab-pane" id="try"><a target="_blank" href="http://demo.seedprod.com">http://demo.seedprod.com</a> opened in a new tab.</div>
		  <div class="tab-pane" id="changelog">
		 
			</div><!-- End Last tab -->

		</div>
		<div style="margin:20px 0; text-align:center;">
		<a href="/pricing/" class="btn btn-large btn-seedprod"><i class="icon-shopping-cart icon-white"></i> See Pricing</a> 
		</div>
	</div>

	

		

		<!-- Footer Action -->

		<!--<div id="footer-goto-features">
		    <h3>Buy Now and Increase Your Chance Of Launching A Successful WordPress Website</h3>
		    <a href="/pricing/"  class="btn btn-large btn-seedprod"><i class="icon-shopping-cart icon-white"></i> See Pricing</a>
		     <a href="http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing" onclick="_gaq.push(['_link',
'http://sites.fastspring.com/seedprod/product/coming-soon-pro-pricing']); return false;" class="btn btn-large btn-seedprod"><i class="icon-shopping-cart icon-white"></i> See Pricing</a> 
		</div>-->
		




	<script>
		jQuery(document).ready(function($) {
			$('#features-tb').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			});
			$('#features-tb a:first').tab('show');
			$('#features-tb li:eq(4) a').click(function (e) {
				//location.href = 'http://demo.seedprod.com'
				//$('#features-tb a:first').tab('show');
				window.open('http://demo.seedprod.com');
			});
			$('#features-tb li:eq(3) a').click(function (e) {
				//location.href = 'http://demo.seedprod.com'
				//$('#features-tb a:first').tab('show');
				window.open('http://demo.seedprod.com/coming-soon-pro/');
			});

			// $('#feature-list ul').affix({
		 //      offset: {
		 //        top: 490
		 //      }
		 //    })
		});	
		</script>
<?php get_footer(); ?>