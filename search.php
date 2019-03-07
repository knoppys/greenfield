<?php get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col-8">
				<main>
					<?php 
						if ( have_posts() ) :
						while ( have_posts() ) : the_post(); ?>

						<div class="item">
							<div class="row">													
								<?php echo get_template_part('templateparts/content-item-listings'); ?>					
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">More</a>
						</div>

					<?php endwhile; else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>						 
					<?php endif; ?>
					<?php posts_nav_link(); ?> 
				</main>
			</div>			
		</div>
	</div>

<?php get_footer();