<?php get_header(); ?>

	<div class="container">
		<div class="well">
			<h1>Thank You</h1>
			<div class="row-fluid">

			<?php
echo '<iframe src="https://www.e-junkie.com/ecom/rp.php?noredirect=true&client_id=CID&txn_id=' . htmlspecialchars($_GET["txn_id"]) . '" style="width:100%;border:0;height:500px;">Loading ...</iframe>';
?>

			</div><!--/row -->
		</div>
	</div><!-- /container -->



<?php get_footer(); ?>