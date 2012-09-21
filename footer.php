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
    <?php wp_footer(); ?>
    <!-- begin olark code --><script cf-async="false" data-cfasync="false" type='text/javascript'>/*{literal}<![CDATA[*/
	window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
	/* custom configuration goes here (www.olark.com/documentation) */
	olark.identify('9920-195-10-4093');/*]]>{/literal}*/</script><noscript><a href="https://www.olark.com/site/9920-195-10-4093/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript><!-- end olark code -->


	<!-- HelloBar -->
	<script cf-async="false" type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/hellobar-solo/hellobar.js"></script>
	<script>
	    new HelloBar( '<span>Wanna try before you buy? Check out the new demo playground.</span> <a href="http://demo.seedprod.com" class="button">Go Play!</a>', {
			showWait: 1000,
	   	positioning: 'push',
	    //barColor:'#FFC861',
		 	fonts: 'Arial, Helvetica, sans-serif',
	    helloBarLogo: false
		 }, 1.0 );
	</script>

	<!-- Record Kissmetric Events -->
	<?php if(!is_user_logged_in()) { ?>
	<script>
	<?php if(is_front_page()): ?>
		_kmq.push(['record', 'Viewed Home']);
	<?php endif; ?>
	<?php if(is_page('features')): ?>
		_kmq.push(['record', 'Viewed Features']);
	<?php endif; ?>
	<?php if(is_page('pricing')): ?>
		_kmq.push(['record', 'Viewed Pricing']);
		jQuery(document).ready(function($) {
			$("#csp-dev").click(function() {
				_kmq.push(['record', 'added to cart',{'product category':'plugin', 'product name':'Coming Soon Pro Developer Lifetime License'}]);
			});			
			$("#csp-per").click(function() {
				_kmq.push(['record', 'added to cart',{'product category':'plugin', 'product name':'Coming Soon Pro Personal License'}]);
			});
		});
	<?php endif; ?>
	<?php if(is_page('thank-you')): ?>
		_kmq.push(['record', 'Conversion']);
		_kmq.push(['record', 'billed', {'Billing Amount':'<?php echo $_GET["gross"] ?>'}]);
	 <?php endif; ?>
	</script>
	<?php } ?>
  </body>
</html>