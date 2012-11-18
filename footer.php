    </div> <!-- /.container -->
    </div> <!-- /#db -->

    <footer id="ft">
	    <div class="container">
		    <div id="footer-wrap">
				<div class="row-fluid">
					<div class="span2">
						<div id="footer-1">
						<?php if(!is_page('thank-you')): ?>
							<h5>SeedProd</h5>
							<ul class="unstyled">
								<li><a href="/about/" style="padding-left:0">About</a></li>
								<li><a href="/contact/">Contact</a></li>
								<li><a href="/testimonials/">Testimonials</a></li>
								<li><a href="/affiliates/">Affiliates</a></li>
								
							</ul>
						<?php endif; ?>						
						</div>
					</div>
					<div class="span2">
						<div id="footer-2">
						<?php if(!is_page('thank-you')): ?>
							
							<ul class="unstyled">
								<li class="dlist"><a href="/terms/">Terms &amp; Conditions</a></li>
								<li class="dlist"><a href="/refunds/">Refund Policy</a></li>
								<li class="dlist"><a href="/privacy/">Privacy Policy</a></li>
								<li><a href="/press-kit/">Press Kit</a></li>
							</ul>	
						<?php endif; ?>							
						</div>
					</div>
					<div class="span8">
						<div id="footer-3">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-footer.png">
							<span>
								Copyright &copy; <?php echo date('Y') ?> SeedProd
							</span>
							<a href="https://twitter.com/seedprod" class="twitter-follow-button" data-show-count="false">Follow @seedprod</a>
						</div>
					</div>
				</div>
		    </div><!-- #footer-wrap -->
	    </div>
    </footer><!-- #ft -->

    </div><!-- #pg -->
    

    <?php wp_footer(); ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap/js/bootstrap.js"></script>

    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	<?php 
    // Do not show Olark or HelloBar on the Thanks You page
    if(!is_page('thank-you')){ ?>
	<!-- begin olark code -->
	<script cf-async="false" data-cfasync="false" type='text/javascript'>
		/*{literal}<![CDATA[*/
		window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){f[z]=function(){(a.s=a.s||[]).push(arguments)};var a=f[z]._={},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={0:+new Date};a.P=function(u){a.p[u]=new Date-a.p[0]};function s(){a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{b.contentWindow[g].open()}catch(w){c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{var t=b.contentWindow[g];t.write(p());t.close()}catch(x){b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
		/* custom configuration goes here (www.olark.com/documentation) */
		olark.identify('9920-195-10-4093');/*]]>{/literal}*/
	</script>
	<noscript><a href="https://www.olark.com/site/9920-195-10-4093/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript><!-- end olark code -->


	<!-- HelloBar -->
	<!--<script cf-async="false" type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/hellobar-solo/hellobar.js"></script>-->
	<script>
	  //   new HelloBar( '<span>Wanna try before you buy? Check out the new demo playground.</span> <a href="http://demo.seedprod.com" class="button">Go Play!</a>', {
			// showWait: 1000,
	  //  	positioning: 'push',
	  //   barColor:'#444',
	  //   borderColor: '#333',
	  //   texture: 'light-gradient',
		 // 	fonts: 'Arial, Helvetica, sans-serif',
	  //   helloBarLogo: false
		 // }, 1.0 );
	</script>
	<?php } ?>

	<!-- Record Kissmetric Events -->
	<?php 
	// Check to see if we have already processed this order
	if(is_page('thank-you')){
		global $wpdb;
	    $tablename = "seed_transactions";
	    $transaction_id = $_GET['txn_id'];
		$sql = "SELECT transaction_id FROM $tablename WHERE transaction_id = %s";
	    $safe_sql = $wpdb->prepare($sql,$transaction_id);
	    $q = $wpdb->get_var($safe_sql);

	    $tablename = "seed_orders";
		$sql = "SELECT `order` FROM $tablename WHERE transaction_id = %s";
	    $safe_sql = $wpdb->prepare($sql,$transaction_id);
	    $order = $wpdb->get_var($safe_sql);
	}
	?>
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
	<?php 
	//if(is_page('thank-you') && !empty($_GET["gross"]) && $_GET["gross"] != '0.00' && is_null($q)){ 
	if(is_page('thank-you') && !empty($_GET["gross"]) && is_null($q)){
	?>
		_kmq.push(['record', 'Conversion']);
		_kmq.push(['record', 'billed', {'Billing Amount':'<?php echo $_GET["gross"] ?>'}]);

		// Record Transaction
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-499993-14']);
		  _gaq.push(['_setDomainName', 'seedprod.com']);
		  _gaq.push(['_trackPageview']);
		  _gaq.push(['_addTrans',
		    '<?php echo $_GET['txn_id']; ?>',           // order ID - required
		    'SeedProd',  // affiliation or store name
		    '<?php echo $_GET['gross']; ?>' ,        // total - required
		    '',
		    '',
		    '',
		    '',
		    '<?php echo $_GET['residence_country']; ?>'
		  ]);

		   // add item might be called for every item in the shopping cart
		   // where your ecommerce engine loops through each item in the cart and
		   // prints out _addItem for each
		  <?php
		  if(!empty($order)){
		  $order = unserialize($order);
		  for ($i = 1; $i <= 50; $i++) {
		  	if (isset($order['item_name' . $i])) {
		  ?>
		  _gaq.push(['_addItem',
		    '<?php echo $_GET['txn_id']; ?>',           // order ID - required
		    '<?php echo $order['item_number' . $i]; ?>',           // SKU/code - required
		    '<?php echo $order['item_name' . $i]; ?>',        // product name
		    '',
		    '<?php echo $order['mc_gross_' . $i]; ?>',          // unit price - required
		    '<?php echo $order['quantity' . $i]; ?>'               // quantity - required
		  ]);
		  <?php
		  }}}
		  ?>

		  <?php if(!empty($order)){ ?>
		  _gaq.push(['_trackTrans']); //submits transaction to the Analytics servers
		  <?php } ?>

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		<?php 
		// Process the order
		global $wpdb;
	    $tablename = "seed_transactions";
	    $transaction_id = $_GET['txn_id'];
        $values = array(
            'transaction_id' => $transaction_id

        );
        $format_values = array(
            '%s'
        );
	    $insert_result = $wpdb->insert(
                            $tablename,
                            $values,
                            $format_values
                        );
		?>
		<?php } ?>
	</script>
	<?php } ?>
  </body>
</html>