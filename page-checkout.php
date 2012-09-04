<?php get_header(); ?>
<div class="row-fluid">
	<div class="span9">
		<div class="well">
			<?php if ( have_posts() ) { ?>
				<?php while ( have_posts() ) {
					 the_post(); ?>
					<div id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post' ); ?>>
						<div class="post-header clearfix">
							<h1 class="post-title"><?php the_title(); ?></h1>	
						</div> <!-- /.post-header -->						
						<div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
							<div class="content">
								<?php the_content(); ?>
							</div><!-- /.entry-content -->
						</div><!-- /.entry-content -->
					</div> <!-- /#post- -->
				<?php } // end while ?>
			<?php } // end if ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>