<?php
/*
Template Name: Carrer Centre
*/
//get the header
get_header(); 
//start the page loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<section class="title-header less-padding" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center scroll; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">		
					<h1><?php the_title(); ?></h1>
					<h3><?php the_field('title_slogan'); ?></h3>
				</div>
			</div>
		</div>
	</section>

	<div class="innersearch career-centre-search">
		<?php echo get_template_part('templateparts/job-search'); ?>
	</div>

	<section class="career-centre" id="career-centre">
		<?php echo get_template_part('templateparts/content_career_center'); ?>
	</section>
	
	<section class="testimonials">
		<?php echo get_template_part('templateparts/content_testimonials'); ?>
	</section>
	
	<?php echo get_template_part('templateparts/content_data_protection'); ?>




<?php endwhile; else : 
//if there isnt any content, show this.	
echo '<p> Sorry, no posts matched your criteria. </p>';
//end the loop
endif;
//get the foote
get_footer();
