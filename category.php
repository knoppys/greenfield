<?php get_header(); ?>
	<section class="title-header" style="background: url(<?php echo get_template_directory_uri();?>/images/featured.jpg) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">		
					<h1><?php single_term_title(); ?></h1>			
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
				
					<main>
						<?php 
							if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>

							<div class="item">
								<div class="row">													
									<?php echo get_template_part('templateparts/content-post-archive'); ?>													
								</div>								
							</div>

						<?php endwhile; else : ?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>						 
						<?php endif; ?>
						<div class="paginate">
							<?php posts_nav_link(); ?> 
						</div>
					</main>
				</div>					
				<div class="col-md-3 sidebar">
					<?php echo get_template_part('templateparts/content-categories-nav'); ?>					
					<form class="sidebar-block" role="search" method="get" id="searchform" action="<?php echo get_site_url(); ?>/find-a-job">
						<h3 class="sidetitle">Search for a job</h3>
						<input type="text" value="" name="job" id="job" placeholder="Key word or phrase" required/>		
						<input type="text" value="" name="state" id="state" placeholder="Location" required/>						
						<input type="submit" id="searchsubmit" value="Search" class="btn" />			
					</form>			
				</div>
					
			</div>
		</div>
	</section>

<?php get_footer();