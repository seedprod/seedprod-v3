<?php get_header(); ?>
<div class="row-fluid">
	<div class="span9">
	<div class="white-well">

							
				<div id="main" class="clearfix" role="main">
				
					<?php get_template_part( 'breadcrumbs' ); ?>
				
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
										
										<h2><?php _e( 'All Categories', 'standard'); ?></h2>
										<?php $categories = get_categories( 'hide_empty=1' ); ?>
										<?php if( count( $categories) > 0 ) { ?>
											<p>
												<ul>
													<?php foreach( $categories as $category ) { ?>
														<li><a href="<?php echo get_category_link( $category->cat_ID ); ?>"><?php echo $category->cat_name; ?></a></li>
													<?php } // end foreach ?>
												</ul>
											</p>
										<?php } else { ?>
											<p><?php _e( 'You have no categories.', 'standard'); ?></p>
										<?php } // end if/else ?>
										
										<h2><?php _e( 'All Posts', 'standard'); ?></h2>
										<?php $posts = get_posts( 'orderby=post_date&order=desc&numberposts=-1' ); ?>
										<?php if( count( $posts) > 0 ) { ?>
											<p>
												<ul>
													<?php foreach( $posts as $post ) { ?>
														<?php $title = '' == get_the_title( $post->ID ) ? get_the_time( get_option( 'date_format' ), $post->ID ) : get_the_title( $post->ID ); ?>
														<li><span class="the_date"><?php echo get_the_time( get_option( 'date_format' ), $post->ID ); ?></span>&nbsp;&mdash;&nbsp;<span class="the_title"><a href="<?php echo get_permalink( $post->ID ); ?>"><?php echo $title; ?></a></span></li>
													<?php } // end foreach ?>
												</ul>
											</p>
										<?php } else { ?>
											<p><?php _e( 'You have no posts.', 'standard'); ?></p>
										<?php } // end if/else ?>
										
									</div><!-- /.entry-content -->
								</div><!-- /.entry-content -->
							</div> <!-- /#post- -->
						<?php } // end while ?>
					<?php } // end if ?>
				</div><!-- /#main -->

</div>
</div>		
<div class="span3">
<?php get_sidebar(); ?>
</div>
</div>

<?php get_footer(); ?>