<?php
/*
Template Name: Work for us
*/
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article>
	<section class="title-header" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">		
					<h1><?php the_title(); ?></h1>
					<h3><?php the_field('title_slogan'); ?></h3>
				</div>
			</div>
		</div>
	</section>
	<section class="terms">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<?php the_content(); ?>
					<a href="<?php echo get_site_url(); ?>/contact" class="btn">Get in touch</a>
				</div>	
				<div class="col-sm-5">
					<img src="<?php echo get_template_directory_uri(); ?>/images/workforus.png">
				</div>
			</div>
		</div>
	</section>	
</article>

<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the footer
get_footer();
